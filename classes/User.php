<?php
class User
{
	private $_db, $_data, $_sessionName, $_isLoggedIn, $_cookieName;
	public $picture, $first_name, $last_name, $email, $account_type, $id, $facebook;

	public function __construct($user = null)
	{
		$this->_db = DB::getInstance();
		$this->_sessionName = Config::get('session/session_name');
		$this->_cookieName = Config::get('remember/cookie_name');

		if(!$user)
		{
			if(Session::exists($this->_sessionName))
			{
				$user = Session::get($this->_sessionName);
				if($this->find($user))
				{
					$this->_isLoggedIn = true;
					$this->id = $this->data()->id;
					$this->picture = $this->data()->picture;
					$this->first_name = $this->data()->first_name;
					$this->last_name = $this->data()->last_name;
					$this->email = $this->data()->email;
					$this->account_type = $this->data()->account_type;
					$this->facebook = $this->data()->facebook;
				}
			}
		}
		else
		{
			$this->find($user);
		}
	}

	public function update($fields = array(), $id = null)
	{
		if (!$id && $this->getIsLoggedIn()) {
			$id = $this->data()->id;
		}
		if(!$this->_db->update('user', $id, $fields))
		{
			throw new Exception('There was a problem updating.');
		}
	}

	public function create($fields = array())
	{
		if(!$this->_db->insert('user', $fields))
		{
			throw new Exception('There was a problem creating an account.');
		}
	}

	public function find($user = null)
	{
		if($user)
		{
			$field = (is_numeric($user)) ? 'id': 'username';

			$data = $this->_db->get('user', array($field, '=', $user));
			

			if($data->count())
			{
				$this->_data = $data->first();
				$this->id = $this->data()->id;
				$this->picture = $this->data()->picture;
				$this->first_name = $this->data()->first_name;
				$this->last_name = $this->data()->last_name;
				$this->email = $this->data()->email;
				$this->account_type = $this->data()->account_type;
				$this->facebook = $this->data()->facebook;
				return true;
			}
		}
	}

	public function findWithEmail($email = null)
	{
		if($email)
		{
			$field = "email";
			$data = $this->_db->get('user', array($field, '=', $email));

			if($data->count())
			{
				$this->_data = $data->first();
				return true;
			}
		}
	}

	public function exists()
	{
		return (!empty($this->_data)) ? true : false;
	}

	public function checkPassword($password = null)
	{
		if($password)
		{
			$user = $this->getIsLoggedIn();
			if($user)
			{
				$hashed = Hash::make($password, $this->data()->salt);
				if($this->data()->password === $hashed)
				{
					return true;
				}
			}
		}
		return false;
	}

	public function login($email = null, $password = null, $remember = false)
	{
		if (!$email && !$password && $this->exists())
		{
			Session::put($this->_sessionName, $this->data()->id);
		}
		else
		{
			$user = $this->findWithEmail($email);
			if($user)
			{
				//$hashed = Hash::make($password, $this->data()->salt);
				if($this->data()->password === $password)
				{
					Session::put($this->_sessionName, $this->data()->id);

					/*if($remember)
					{
						$hash = Hash::unique();
						$hashCheck = $this->_db->get('users_session',array('user_id', '=', $this->data()->id));
					
						if(!$hashCheck->count())
						{
							$this->_db->insert('users_session', array(
									'user_id' => $this->data()->id,
									'hash' => $hash
								));
						}
						else
						{
							$hash = $hashCheck->first()->hash;
						}
						Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
					}*/
					return true;
				}
			}
		}

		return false;
	}

	public function logout()
	{
		$this->_db->delete('users_session',array('user_id', '=', $this->data()->id));

		Session::delete($this->_sessionName);
		Cookie::delete($this->_cookieName);
	}

	public function data()
	{
		return $this->_data;
	}

	public function getDB()
	{
		return $this->_db;
	}

	public function getIsLoggedIn()
	{
		return $this->_isLoggedIn;
	}
}
?>