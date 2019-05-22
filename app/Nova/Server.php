<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Fields\Boolean;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\TabsOnEdit; 

class Server extends Resource
{
    use TabsOnEdit; 

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Server';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
        'ip'
    ];

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @var array
     */
    public static $with = ['serverType'];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [

            (new Tabs('Server', [
                'Basic'    => [
                    ID::make()->sortable(),
                    Text::make('Name')->sortable(),
                    Text::make('Ip')->sortable(),
                    Text::make('User')->sortable()->hideFromIndex(),
                    Text::make('Price')->hideWhenCreating()->hideWhenUpdating(),
                    Text::make('Last ping', function () {
                        return $this->getPingAtForHummans() ;
                    }),
                    // Status::make('Status')
                    //     ->loadingWhen(['creating','running'])
                    //     ->failedWhen(['stopped']),
                    Boolean::make('Active')->hideWhenCreating()
                        ->trueValue(1)
                        ->falseValue(0),
                    BelongsTo::make('ServerType'),
                ],
                'Alerts' => HasMany::make('Alerts', 'ServerAlerts', 'App\Nova\ServerAlert'),
                'Metrics' => HasMany::make('Metrics', 'ServerMetrics', 'App\Nova\ServerMetric'),
                'Task Results' => HasMany::make('Tasks', 'tasks', 'App\Nova\ServerTaskResult'),

            ]))->withToolbar()
            

        ];

       
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            (new \App\Nova\Metrics\ServerCpuUsage )->onlyOnDetail(),
            (new \App\Nova\Metrics\ServerMemoryUsage )->onlyOnDetail(),
            (new \App\Nova\Metrics\ServerDiskUsage )->onlyOnDetail(),
            (new \App\Nova\Metrics\ServerConnections )->onlyOnDetail(),
            (new \App\Nova\Metrics\ServerConnectedIps )->onlyOnDetail()
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new Filters\ServerTypeFilter,
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            new Actions\RunRemoteTaskOnServer
        ];
    }
}
