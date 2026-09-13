<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateCrudViews extends Command
{
    // Command signature and description
    protected $signature = 'generate:crud-views {name}';
    protected $description = 'Generate CRUD views for a given resource name';

    // Handle method for the command
    public function handle()
    {
        // Get the resource name from the command argument
        $name = $this->argument('name');
        // $name = ucfirst($name); // Capitalize the first letter for the model name (e.g. "Post" for "posts")
        $viewsPath = resource_path('views/' . $name);

        // Check if the views directory already exists
        if (File::exists($viewsPath)) {
            $this->error("The views directory for {$name} already exists.");
            return;
        }

        // Create the views directory
        File::makeDirectory($viewsPath, 0755, true);

        // Define the views to generate
        $views = [
            'index.blade.php' => $this->generateViewContent('index', $name),
            'edit.blade.php' => $this->generateViewContent('edit', $name),
            'show.blade.php' => $this->generateViewContent('show', $name),
            'table.blade.php' => $this->generateViewContent('table', $name),
            'form.blade.php' => $this->generateViewContent('form', $name),
        ];

        // Generate the view files
        foreach ($views as $filename => $content) {
            File::put($viewsPath . '/' . $filename, $content);
        }

        // Output success message
        $this->info("CRUD views for {$name} have been generated successfully.");
    }

    // Function to generate view content by reading from the template and replacing model name
    private function generateViewContent($viewName, $name)
    {
        // Define the path to the template files
        $templatePath = resource_path('views/templates/' . $viewName . '.blade.php');

        // Check if the template file exists
        if (!File::exists($templatePath)) {
            $this->error("Template file for {$viewName} does not exist.");
            return '';
        }

        // Get the content of the template file
        $content = File::get($templatePath);

        // Replace the placeholder `$model` with the actual model name
        $content = str_replace('$model', $name, $content);

        // Now render the view content and return it
        return $content;
    }
}