<?php defined('BASEPATH') or exit('No direct script access allowed');

class processController extends CI_Controller
{

    public function index()
    {
        if (isset($_POST['open_frame'])) {
            // Retrieve the value from $_POST
            $categorieDeSac = $this->input->post('categorieDeSac');
            
            // Escape the value to ensure it is safe for the command-line
            $escapedValue = escapeshellarg($categorieDeSac);
            
            // Execute the C program with the value as a command-line argument
            $output = shell_exec('D:\ITU\S4\MrTahina\EcoGenius\bin\Debug\EcoGenius.exe ' . $escapedValue);
            
            // Display the output
            echo $output;
            
            redirect('accueilController');
        }
    }
}
