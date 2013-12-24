<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - О авторе';
$this->breadcrumbs=array(
	'О авторе',
);

Yii::app()->clientscript
    ->registerCssFile( Yii::app()->request->baseUrl . '/css/profile.css' );
?>
<h1>О авторе</h1>


<div class="row-fluid">
    <div class="profile-card">
        <div class="span3">
            <img src="http://m2.c.lnkd.licdn.com/mpr/mpr/shrink_200_200/p/2/005/029/0d4/12a98fd.jpg" width="200" height="200" class="img-rounded">
        </div>
        <div class="span9">
            <h1>Алексей Федоренко <img src="<?php echo Yii::app()->createUrl('images/blank.gif');?>" class="flag flag-ua" alt="Ukraine" /></h1>
            <span class="lead">Web engenieer-programmer</span>
            <p>Занимаюсь проектирование баз данных, разработкой сайтов различной сложности, систем управления. В целом увлекаюсь веб-технологиями и новинками различных социальных сервисов. Пишу на фреймворках. Любимые PHP фреймворки - Yii и Kohana. Использую jQuery и Twitter Bootstrap.</p>
            <p>Блог создавался с целью ведения личных записей для решения различных задач, которые выпадают на долю веб разработчика. Поэтому весь материал в данном пособии можно считать учебным.</p>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="profile-skills">
        <h2>Профессиональные навыки</h2>
        <div class="span6">
            <div class="well">
                PHP (Frameworks)
            </div>
            <div class="progress progress-striped active">
                <div class="bar bar-success" style="width: 60%;">Yii</div>
                <div class="bar bar-info" style="width: 40%;">Kohana</div>
            </div>
        </div>
        <div class="span5">
            <div class="well">
                JavaScript (Frameworks)
            </div>
            <div class="progress progress-striped active">
                <div class="bar bar-success" style="width: 50%;">jQuery</div>
                <div class="bar bar-info" style="width: 30%;">jQuery UI</div>
                <div class="bar bar-warning" style="width: 20%;">jQuery Mobile</div>
            </div>
        </div>
        <div class="span5">
            <div class="well">
                HTML & CSS
            </div>
            <div class="progress progress-striped active">
                <div class="bar bar-success" style="width: 50%;">HTML 5</div>
                <div class="bar bar-info" style="width: 20%;">CSS 3</div>
                <div class="bar bar-warning" style="width: 30%;">Twitter Bootstrap</div>
            </div>
        </div>
        <div class="span6">
            <div class="well">
                Базы данных
            </div>
            <div class="progress progress-striped active">
                <div class="bar bar-success" style="width: 50%;">MySQL</div>
                <div class="bar bar-info" style="width: 30%;">PostgreSQL</div>
                <div class="bar bar-warning" style="width: 10%;">SQLite</div>
                <div class="bar bar-danger" style="width: 10%;">noSQL</div>
            </div>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="profile-job">
        <h2>Опыт работы</h2>
        <div class="span5">
            <div class="well">
               Веб инженер-программист (текущая)
            </div>
            <div class="company">
                <a href="http://topsu.ru" target="_blank">topsu.ru</a>
            </div>
            <div class="from">
                с июля 2013 по текущее время | г. Сумы
            </div>
            <div class="description">
               веб разработка crm-системы для менеджеров, проектирование и разработка различных социальных сервисов
            </div>
        </div>
        <div class="span3">
            <div class="well">
               web developer
            </div>
            <div class="company">
                <a href="http://bvblogic.com" target="_blank">[bvblogic]</a>
            </div>
            <div class="from">
                с июля 2012 по июль 2013 | г. Сумы
            </div>
            <div class="description">
                веб доработки различных проектов
            </div>
        </div>
        <div class="span3">
            <div class="well">
                старший лаборант
            </div>
            <div class="company">
                <a href="http://dl.sumdu.edu.ua" target="_blank">РЦДО СумГУ</a>
            </div>
            <div class="from">
                с сентября 2011 по июнь 2012 | г. Сумы
            </div>
            <div class="description">
               создание электронных курсов для студентов-дистационников, доработки сайта лаборатории
            </div>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="profile-education">
        <h2>Образование</h2>
        <div class="span4">
            <div class="well">
                Специалист (математик-программист)
            </div>
            <div class="edu">
                Сумской государственный университет, факультет ЭлИТ, специальность Информатика
            </div>
            <div class="from">
                2012-2013 | г. Сумы
            </div>
        </div>
        <div class="span4">
            <div class="well">
                Бакалавр (информационные технологии)
            </div>
            <div class="edu">
                Сумской государственный университет, факультет ЭлИТ, специальность Информатика
            </div>
            <div class="from">
                2009 - 2012 | г. Сумы
            </div>
        </div>
        <div class="span3">
            <div class="well">
                Младший специалист (техник-программист)
            </div>
            <div class="edu">
               Машиностроительный колледж СумГУ, Эксплуатация систем обробатки информации и принятия решений
            </div>
            <div class="from">
                2005-2009 | г. Сумы
            </div>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="profile-interests">
        <h2>Интересы</h2>
        <div class="span12">
            <span class="label label-info">Программирование</span>
            <span class="label label-info">Веб технологии</span>
            <span class="label label-info">Футбол</span>
            <span class="label label-info">Теннис</span>
            <span class="label label-info">Плавание</span>
            <span class="label label-info">Автомобили</span>
            <span class="label label-info">Дизайн</span>
            <span class="label label-info">Психология личности</span>
            <span class="label label-info">Маркетинг и СЕО</span>
            <span class="label label-info">Книги</span>
        </div>
    </div>
</div>