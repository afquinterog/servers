<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Deployments\GithubParser;
use Facades\App\Deployments\Deploy;

class DeploymentController extends Controller
{
    /**
     * Hook to enable github deployments
     */
    public function hookGithub(Request $request, GithubParser $githubParser){
        $data = $request->all();
        Log::info($data);

        $token = $request->input('token', ' ' ); // 123
        
        if($token == env('DEPLOY_TOKEN') ){
            //Get the repo name

            // $repo = $repoData['repository']['html_url'] ;
            // // $sshRepo = $repoData['repository']['ssh_url'];
            // //$repo = explode("/", $repo );
            // //$repo = end( $repo ) ;
            // //Get the branch name
            // $branch = explode("/", $repoData['ref']);
            // $branch = end( $branch );
            
            // //Get the committer
            // $committer = $repoData['head_commit']['committer']['name'] ;

            // $message = $repoData['head_commit']['message'] ?? "" ;
            // $timestamp = $repoData['head_commit']['timestamp'] ?? "" ;
            // $url = $repoData['head_commit']['url'] ?? "" ;

            // //Previous commit 
            // $before = $repoData['before'] ;
            // $actual = $repoData['after'] ;
            // $before = $repoData['before'] ;


            // Log::info( 'Real Branch:' . $branch );
            // Log::info( 'Previous commit :' . $before);
            // Log::info( 'message :' . $message);
            // Log::info( 'time:' . $timestamp);
            // Log::info( 'Url= :' . $url);
            // Log::info( 'Actual commit :' . $actual);
            // Log::info( 'Comitter:' . $repoData['head_commit']['committer']['name'] );
            // Log::info( 'Repo:' . $repo );
            // Log::info('new task dispatched:' . $branch . "/" . $committer . "/" . $repo );

            $commit = $githubParser->parse($data);

            Deploy::apply($commit);


            //dispatch( new ProcessGithubDeploy($branch, $committer, $repo) );
            //dispatch(new ProcessDeploy(CommitMessage $message ) );
        }
    }
}
