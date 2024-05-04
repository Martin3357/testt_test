<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Process\Process;
use Symfony\Component\Routing\Annotation\Route;

class ScholarController extends AbstractController
{
    /**
     * @Route("api/scholar_scrap", name="runPythonScript", methods={"GET"})
     */
    public function runPythonScript(): Response
    {
        // Change directory to where your Python script is located
        $process = new Process(['C://Python39//python', 'scholarscrape.py']);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new \RuntimeException($process->getErrorOutput());
        }

        return new Response('Python script executed successfully.');
    }
}
