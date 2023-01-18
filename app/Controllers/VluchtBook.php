<?php
class VluchtBook extends BaseController
{
    private int $delay = 2;
    private string $infoMessage = '';

    private readonly mixed $VluchtBookModel;

    public function __construct()
    {
        $this->VluchtBookModel = $this->model('VluchtBookModel');
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $VluchtBooks = $this->VluchtBookModel->getVluchtBooks();

            $data = ['VluchtBooks' => $VluchtBooks];

            // Send the data to view VluchtBook/index.
            $this->view('VluchtBook/index', $data);
        }
    }

    public function details(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data = $this->VluchtBookModel->getVluchtBookInfoById($id);

            $this->view('VluchtBook/details', $data);
        }
    }

    public function update(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $modifiedVluchtBook = $this->VluchtBookModel->getVluchtBookInfoById($id);

            $data = VluchtBookHelper::mapVluchtBookRowToObject($modifiedVluchtBook);

            $this->view('VluchtBook/update', $data);
        } else //elseif($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST);

            $data = VluchtBookHelper::setInputVluchtBookFieldsToVluchtBookObject($_POST, 'update');

            // Valide all the input fields of update method.
            $isViewValid = VluchtBookValidator::validateVluchtBookInputFields($data);

            // Check whether the update view is valid.
            if ($isViewValid && $this->VluchtBookModel->updateVluchtBook($data)) {
                $this->infoMessage = FormatTextHelper::GetInfoMessage("Selected VluchtBook has been modified", EnumTypeMessage::Success);

                header("refresh:$this->delay; url=" . URLROOT  . '/VluchtBook/index' . $this->infoMessage);
            } else {
                $this->infoMessage = FormatTextHelper::GetInfoMessage("Selected VluchtBook has been not modified", EnumTypeMessage::Error);

                header("refresh:$this->delay; url=" . URLROOT  . '/VluchtBook/update' . $this->infoMessage);

                // Stay in the update VluchtBook view.
                $this->view('VluchtBook/update', $data);
            }
        }
    }

    public function create()
    {
        $data = VluchtBookHelper::createEmptyVluchtBookObject();

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->view('VluchtBook/create', $data);
        } else //elseif($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST);

            $data = VluchtBookHelper::setInputVluchtBookFieldsToVluchtBookObject($_POST, 'create');

            // Valide all the input fields of create method.
            $isViewValid = VluchtBookValidator::validateVluchtBookInputFields($data);

            // Check whether the create view is valid.
            if ($isViewValid && $this->VluchtBookModel->createVluchtBook($data)) {
                $this->infoMessage = FormatTextHelper::GetInfoMessage("New VluchtBook has been created", EnumTypeMessage::Success);

                header("refresh:$this->delay; url=" . URLROOT  . '/VluchtBook/index' . $this->infoMessage);
            } else {
                $this->infoMessage = FormatTextHelper::GetInfoMessage("New VluchtBook has been not created", EnumTypeMessage::Error);

                header("refresh:$this->delay; url=" . URLROOT  . '/VluchtBook/create' . $this->infoMessage);

                $this->view('VluchtBook/update', $data);
            }
        }
    }

    /**
     * Delete selected ollicitant from index VluchtBook view.
     * @param integer $id
     * @return void
     */
    public function delete(int $id)
    {
        // Check whether the delete request has been processed.
        if ($this->VluchtBookModel->deleteVluchtBook($id)) {
            // Display een info message on VluchtBook index view.
            $this->infoMessage = FormatTextHelper::GetInfoMessage("Selected VluchtBook has been deleted", EnumTypeMessage::Success);

            // Redirect to the index VluchtBook view. 
            header("refresh:$this->delay; url=" . URLROOT  . '/VluchtBook/index' . $this->infoMessage);
        } else {
            // Display een error message on VluchtBook index view.
            $this->infoMessage = FormatTextHelper::GetInfoMessage("Selected VluchtBook has been not deleted", EnumTypeMessage::Error);

            // Redirect to the index VluchtBook view. 
            header("refresh:$this->delay; url=" . URLROOT  . '/VluchtBook/index' . $this->infoMessage);

            // Stay in the index VluchtBook view.
            $this->view('VluchtBook/index');
        }
    }
}