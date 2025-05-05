<?php

namespace app\tests\unit\models;

use app\models\UserIdentity;
use Codeception\Test\Unit;

class UserTest extends Unit
{
    public function testFindUserById()
    {
        verify($user = UserIdentity::findIdentity(1))->notEmpty();
        verify($user->NAME)->equals('Admin');

        verify(UserIdentity::findIdentity(999))->empty();
    }

    public function testFindUserByAccessToken()
    {
        verify(UserIdentity::findIdentityByAccessToken('100-token'))->empty();
        verify(UserIdentity::findIdentityByAccessToken('non-existing'))->empty();
    }

    public function testFindUserByUsername()
    {
        verify($user = UserIdentity::findByLogin('admin'))->notEmpty();
        verify(UserIdentity::findBylogin('not-admin'))->empty();
    }

    public function testValidateUser()
    {
        $user = UserIdentity::findByLogin('admin');
        verify($user->validateAuthKey('test102key'))->empty();

        verify($user->validatePassword('admin'))->notEmpty();
        verify($user->validatePassword('<password>'))->empty();
    }

}
