<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use App\Models\Task;
use App\Jobs\RunTask;
use Laravel\Nova\Fields\Select;

class RunRemoteTaskOnServer extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            //(new AccountData($model))->send();
            Log::info('Run task on:' . $model->name );
            Log::info('Task name:' . $fields->task );

            $task = Task::where('id', $fields->task )->firstOrFail();
            Log::info('name' . $task->name);

            RunTask::dispatch($model, $task);
        }

        return Action::message('Task creation started!');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        $tasks = Task::all();

        $data = $tasks->mapWithKeys(function ($item) {
            return [ $item->id => $item->code ];
        });

        return [
            Select::make('task')->options($data)
        ];
    }
}
