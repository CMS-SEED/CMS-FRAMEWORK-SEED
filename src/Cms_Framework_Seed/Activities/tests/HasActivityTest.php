<?php

namespace Cms_Framework_Seed\Activities\Test;

use Illuminate\Database\Eloquent\SoftDeletes;
use Cms_Framework_Seed\Activities\Models\Activity;
use Cms_Framework_Seed\Activities\Test\Models\User;
use Cms_Framework_Seed\Activities\Traits\HasActivity;

class HasActivityTest extends TestCase
{
    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = new class() extends User {
            use HasActivity;
            use SoftDeletes;
        };

        $this->assertCount(0, Activity::all());
    }

    /** @test */
    public function it_can_log_activity_on_subject_by_same_causer()
    {
        $user = $this->loginWithFakeUser();

        $user->name = 'HasActivity Name';
        $user->save();

        $this->assertCount(1, Activity::all());

        $this->assertInstanceOf(get_class($this->user), $this->getLastActivity()->subject);
        $this->assertEquals($user->id, $this->getLastActivity()->subject->id);
        $this->assertEquals($user->id, $this->getLastActivity()->causer->id);
        $this->assertCount(1, $user->activity);
        $this->assertCount(1, $user->actions);
    }

    public function loginWithFakeUser()
    {
        $user = new $this->user();

        $user::find(1);

        $this->be($user);

        return $user;
    }
}
