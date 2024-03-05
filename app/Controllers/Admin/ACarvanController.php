<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CaravanModel;

class ACarvanController extends BaseController
{
    public function carvanListPage()
    {
        // Create an instance of the CaravanModel
        $caravanModel = new CaravanModel();

        // Fetch all data from the caravans table
        $caravans = $caravanModel->findAll();

        // Pass the data to the view
        return view('admin/dashboard/carvans-list', ['caravans' => $caravans]);
    }

    public function carvanRegPage()
    {
        return view('admin/dashboard/carvan-registration');
    }

    public function carvanRegHandeler()
    {
        $session = session();

        $image = $this->request->getFile('images_url');
        $imageName = $image->getRandomName();
        if ($image->move(ROOTPATH . 'public/cars', $imageName)) {
            $data = [
                'admin_id' => $session->has('admin_id'),
                'caravan_name' => $this->request->getPost('caravan_name'),
                'make' => $this->request->getPost('make'),
                'model' => $this->request->getPost('model'),
                'year' => $this->request->getPost('year'),
                'registration_number' => $this->request->getPost('registration_number'),
                'color' => $this->request->getPost('color'),
                'mileage' => $this->request->getPost('mileage'),
                'images_url' => $imageName, // Saving the file name in the database
                'short_description' => $this->request->getPost('short_description'),
                'long_description' => $this->request->getPost('long_description'),
                'tags' => $this->request->getPost('tags'),
                'features' => $this->request->getPost('features'),
                'amenities' => $this->request->getPost('amenities'),
                'minimum_days_available' => $this->request->getPost('minimum_days_available'),
                'dates_availability' => $this->request->getPost('dates_availability'),
                'deposit_price' => $this->request->getPost('deposit_price'),
                'per_day_price' => $this->request->getPost('per_day_price'),
                'rules_regulations' => $this->request->getPost('rules_regulations'),
            ];
            $caravanModel = new CaravanModel();
            if ($caravanModel->insert($data)) {
                // Insertion successful
                return redirect()->to('/admin/dashboard/carvans-list');
            } else {
                // Insertion failed, display error
                $errors = $caravanModel->errors();
                // Handle errors, you can log or display them as per your requirement
                echo "<pre>";
                print_r($errors);
                echo "</pre>";
            }
        } else {
            // Error moving uploaded file
            $error = $image->getErrorString() . ' (' . $image->getError() . ')';
            echo "File Upload Error: $error";
        }
    }

    public function carvanEditPage($carvanId)
    {
        $caravanModel = new CaravanModel();
        $caravanDetails = $caravanModel->find($carvanId);

        return view('admin/dashboard/carvan-edit', ['caravanDetails' => $caravanDetails]);
    }

    public function carvanEditHandeler()
    {
        $caravanId = $this->request->getPost('id');
        $session = session();
        $image = $this->request->getFile('images_url');
        $imageName = $image->getRandomName();
        if ($image->move(ROOTPATH . 'public/cars', $imageName)) {
            $data = [
                'admin_id' => $session->has('admin_id'),
                'caravan_name' => $this->request->getPost('caravan_name'),
                'make' => $this->request->getPost('make'),
                'model' => $this->request->getPost('model'),
                'year' => $this->request->getPost('year'),
                'registration_number' => $this->request->getPost('registration_number'),
                'color' => $this->request->getPost('color'),
                'mileage' => $this->request->getPost('mileage'),
                'images_url' => $imageName, // Saving the file name in the database
                'short_description' => $this->request->getPost('short_description'),
                'long_description' => $this->request->getPost('long_description'),
                'tags' => $this->request->getPost('tags'),
                'features' => $this->request->getPost('features'),
                'amenities' => $this->request->getPost('amenities'),
                'minimum_days_available' => $this->request->getPost('minimum_days_available'),
                'dates_availability' => $this->request->getPost('dates_availability'),
                'deposit_price' => $this->request->getPost('deposit_price'),
                'per_day_price' => $this->request->getPost('per_day_price'),
                'rules_regulations' => $this->request->getPost('rules_regulations'),
            ];
            $caravanModel = new CaravanModel();
            $caravanModel->update($caravanId, $data);

            return redirect()->to(route_to('admin.carvanListPage'));
        } else {
            // Error moving uploaded file
            $error = $image->getErrorString() . ' (' . $image->getError() . ')';
            echo "File Upload Error: $error";
        }
    }

    public function caravanDeleteHandeler($caravanId)
    {
        // Instantiate the CaravanModel
        $caravanModel = new CaravanModel();

        // Delete the caravan from the database
        $caravanModel->delete($caravanId);

        // Redirect or return response as needed
        return redirect()->to(route_to('admin.carvanListPage'));
    }
}
