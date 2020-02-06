<?php


namespace App\Service;


use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class APIPersonMaker
{
    private $name;
    private $surname;
    private $gender;
    private $region;
    private $age;
    private $title;
    private $phone;
    private $birthday;
    private $email;
    private $password;
    private $credit_card;
    private $photo;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getCreditCard()
    {
        return $this->credit_card;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }


    /**
     * APIPersonMaker constructor.
     */
    public function __construct()
    {
        $curlHttpClient = new CurlHttpClient();
        try {
            $response = $curlHttpClient->request('GET', 'https://uinames.com/api/?ext');
            $content = $response->toArray();

            $this->name = $content['name'];
            $this->surname = $content['surname'];
            $this->gender = $content['gender'];
            $this->region = $content['region'];
            $this->age = $content['age'];
            $this->title = $content['title'];
            $this->phone = $content['phone'];
            $this->birthday = $content['birthday'];
            $this->email = $content['email'];
            $this->password = $content['password'];
            $this->credit_card = $content['credit_card'];
            $this->photo = $content['photo'];


        } catch (TransportExceptionInterface $e) {
            $this->addFlash('error', 'did not work');
        }
    }
}






















