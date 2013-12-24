<?php

class PostController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column3';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
            /*array(
                'COutputCache + index',
                'duration'=>10,
                'varyByParam'=>array('id'),
            ),*/
            /*array(
                'CHttpCacheFilter + index', //caching page by http with action index
                'lastModified'=>Yii::app()->db->createCommand("SELECT MAX(`update_time`) FROM {{post}}")->queryScalar(),
            ),*/
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
				'users'=>array('admin'),
			),
			/*array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),*/
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 *
	 */
	public function actionView()
	{
        $post = $this->loadModel();
        $comment = $this->newComment($post);

		$this->render('view',array(
			'model'=> $post,
            'comment'=> $comment,
		));
	}

    /**
     * Adding new comment to post
     */
    protected function newComment($post)
    {
        $comment = new Comment;
        if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
        {
            echo CActiveForm::validate($comment);
            Yii::app()->end();
        }
        if (isset($_POST['Comment'])) {
            $comment->attributes = $_POST['Comment'];
            if ($post->addComment($comment)) {
                if ($comment->status == Comment::STATUS_PENDING && Yii::app()->params['commentNeedApproval'])
                    Yii::app()->user->setFlash('commentSubmitted', 'Спасибо, Ваш комментарий будет добавлен после проверки и подтверждения.');
                $this->refresh();
            }
        }
        return $comment;
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        $this->layout='//layouts/column2';
		$model=new Post;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        $this->layout='//layouts/column2';
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
        if (Yii::app()->request->isPostRequest) {
            $this->loadModel()->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else {
            throw new CHttpException(400,'Некорректный запрос.');
        }
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $this->pageTitle = Yii::app()->name. ' - Последние записи';
        $criteria=new CDbCriteria(array(
            'condition'=>'status='.Post::STATUS_PUBLISHED,
            'order'=>'update_time DESC',
            'with'=>'commentCount',
        ));
        if(isset($_GET['tag']))
            $criteria->addSearchCondition('tags',$_GET['tag']);

        if(isset($_GET['category_id']))
            $criteria->addSearchCondition('category_id', intval($_GET['category_id']));

        if(isset($_GET['tag']))
            $criteria->addSearchCondition('tags',$_GET['tag']);

        if (isset($_GET['q']) && !empty($_GET['q'])) {
            $criteria->addSearchCondition('title', $_GET['q']);
            $criteria->addSearchCondition('content', $_GET['q'], true, 'OR');
        }

		$dataProvider=new CActiveDataProvider('Post', array (
                'pagination'=>array(
                    'pageSize'=>Yii::app()->params['onPage'],
                ),
                'criteria'=>$criteria,
            )
        );
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

    /**
     * Make RSS channel using edeed ext
     */
    public function actionFeed()
    {
        Yii::import('ext.feed.*');
        // RSS 2.0 is the default type
        $feed = new EFeed();

        $feed->title= Yii::app()->name;
        $feed->description = 'RSS лента блога о веб разработке';

        $feed->addChannelTag('language', Yii::app()->language);
        $feed->addChannelTag('pubDate', date(DATE_RSS, time()));
        $feed->addChannelTag('link', 'http://'.Yii::app()->request->getServerName().'/rss.xml');

        $criteria=new CDbCriteria(array(
            'condition'=>'status='.Post::STATUS_PUBLISHED,
            'order'=>'update_time DESC',
            'limit'=>20,
        ));

        $posts = Post::model()->findAll($criteria);

        foreach($posts as $post) {

            $item = $feed->createNewItem();

            $item->title = $post->title;
            $item->link = 'http://'.Yii::app()->request->getServerName().Yii::app()->createUrl($post->url);
            $item->date = $post->update_time;
            $item->description = $post->content;

            $item->addTag('author', Yii::app()->params['adminEmail']);
            $item->addTag('guid','http://'.Yii::app()->request->getServerName().Yii::app()->createUrl($post->id.'/'.$post->seo_url), array('isPermaLink'=>'true'));

            $feed->addItem($item);

        }

        $feed->generateFeed();
        Yii::app()->end();
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $this->layout='//layouts/column2';
		$model=new Post('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Post']))
			$model->attributes=$_GET['Post'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Post the loaded model
	 * @throws CHttpException
	 */
	/*public function loadModel($id)
	{
		$model=Post::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}*/
    private $_model;

    public function loadModel()
    {
        if($this->_model===null)
        {
            if(isset($_GET['id']))
            {
                if(Yii::app()->user->isGuest)
                    $condition='status='.Post::STATUS_PUBLISHED
                        .' OR status='.Post::STATUS_ARCHIVED;
                else
                    $condition='';
                $this->_model=Post::model()->findByPk(intval($_GET['id']), $condition);
            }
            if($this->_model===null)
                throw new CHttpException(404,'Запрашиваемая страница не существует.');
        }
        return $this->_model;
    }

    /**
     * Suggests tags based on the current user input.
     * This is called via AJAX when the user is entering the tags input.
     */
    public function actionSuggestTags()
    {
        if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
        {
            $tags=Tag::model()->suggestTags($keyword);
            if($tags!==array())
                echo implode("\n",$tags);
        }
    }

	/**
	 * Performs the AJAX validation.
	 * @param Post $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='post-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
