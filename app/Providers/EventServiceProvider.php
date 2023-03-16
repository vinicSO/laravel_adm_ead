<?php

namespace App\Providers;

use App\Events\SupportRepliedEvent;
use App\Listeners\SendSupportEmailReplied;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\ReplySupport;
use App\Models\User;
use App\Observers\AdminObserver;
use App\Observers\CourseObserver;
use App\Observers\LessonObserver;
use App\Observers\ReplySupportObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SupportRepliedEvent::class => [
            SendSupportEmailReplied::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Admin::observe(AdminObserver::class);
        Course::observe(CourseObserver::class);
        Lesson::observe(LessonObserver::class);
        ReplySupport::observe(ReplySupportObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
