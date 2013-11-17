<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * @var User Id
     */
    private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        $username = strtolower($this->username);
        $record = User::model()->find('LOWER(username)=?', array($username));


		if($record === NULL)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif(!$record->validatePassword($this->password)) //better than $record->password !== crypt($this->password, $record->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else {
            $this->_id = $record->id;
            $this->username=$record->username;
            $this->setState('email', $record->email);
            $this->errorCode=self::ERROR_NONE;
        }

		return !$this->errorCode;
	}

    public function getId()
    {
        return $this->_id;
    }
}