<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\Cart;
use App\Entity\Customer;
use App\Entity\Email;
use App\Entity\OrderDetails;
use App\Entity\Payment;
use App\Entity\Phone;
use App\Entity\ProductCatalog;
use App\Entity\ProductCatalogCart;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

function dataCustomer($manager, $firstName, $lastName, $dob, $gender, $primaryAddress, $primaryPhone, $primaryEmail, $primaryPayment)
{
    $customer = new Customer;
    $customer->setFirstName($firstName)
        ->setLastName($lastName)
        ->setDob($dob)
        ->setGender($gender)
        ->setPrimaryAddress($primaryAddress)
        ->setPrimaryPhone($primaryPhone)
        ->setPrimaryEmail($primaryEmail)
        ->setPrimaryPayment($primaryPayment);

    $manager->persist($customer);
    return $customer;
}

function dataPhone($manager, $customer, $countryCode, $areaCode, $phoneNumber, $extention, $phoneType, $primaryPhone)
{
    $phone = new Phone;
    $phone->setCustomer($customer)
        ->setCountryCode($countryCode)
        ->setAreaCode($areaCode)
        ->setPhoneNumber($phoneNumber)
        ->setExtention($extention)
        ->setPhoneType($phoneType)
        ->setPrimaryPhone($primaryPhone);

    $manager->persist($phone);
}
function dataEmail($manager, $customer, $email, $emailType, $primaryEmail)
{
    $mail = new Email;
    $mail->setCustomer($customer)
        ->setEmail($email)
        ->setEmailType($emailType)
        ->setPrimaryEmail($primaryEmail);

    $manager->persist($mail);
}

function dataAddress($manager, $customer, $address, $aptSuite, $city, $state, $zipCode, $country, $addressType, $primaryAddress)
{
    $addr = new Address;
    $addr->setCustomer($customer)
        ->setAddress($address)
        ->setAptSuite($aptSuite)
        ->setCity($city)
        ->setState($state)
        ->setZipCode($zipCode)
        ->setCountry($country)
        ->setAddressType($addressType)
        ->setPrimaryAddress($primaryAddress);

    $manager->persist($addr);
}

function dataPayment($manager, $customer, $ccNumber, $ccType, $ccNameDifferent, $ccExpMonth, $ccExpYear, $ccSecCode, $primaryPayment)
{
    $payment = new Payment;
    $payment->setCustomer($customer)
        ->setCcNumber($ccNumber)
        ->setCcType($ccType)
        ->setCcNameDifferent($ccNameDifferent)
        ->setCcExpMonth($ccExpMonth)
        ->setCcExpYear($ccExpYear)
        ->setCcSecCode($ccSecCode)
        ->setPrimaryPayment($primaryPayment);

    $manager->persist($payment);
    return $payment;
}

function dataOrderDetails($manager, $customer, $payment, $paymentDate, $orderDate, $shipDate, $shipMethod, $fullfillmentDate, $cancellationDate, $returnDate)
{
    $orderDetails = new OrderDetails;
    $orderDetails->setCustomer($customer)
        ->setPayment($payment)
        ->setPaymentDate($paymentDate)
        ->setOrderDate($orderDate)
        ->setShipDate($shipDate)
        ->setShipMethod($shipMethod)
        ->setFullfillmentDate($fullfillmentDate)
        ->setCancellationDate($cancellationDate)
        ->setReturnDate($returnDate);

    $manager->persist($orderDetails);
    return $orderDetails;
}

function dataCart($manager, $orderDetails, $cartName)
{
    $cart = new Cart;
    $cart->setOrderDetails($orderDetails)
        ->setCartName($cartName);

    $manager->persist($cart);
    return $cart;
}

function dataProduct($manager, $productName, $vendorId, $manufacturerId, $colorId, $sizeId, $unitId, $pricePerUnit, $weightPerUnit)
{
    $product = new ProductCatalog;
    $product->setProductName($productName)
        ->setVendorId($vendorId)
        ->setManufacturerId($manufacturerId)
        ->setColorId($colorId)
        ->setSizeId($sizeId)
        ->setUnitId($unitId)
        ->setPricePerUnit($pricePerUnit)
        ->setWeightPerUnit($weightPerUnit);
    $manager->persist($product);
    return $product;
}

function dataProductCatalogCart($manager, $product, $cart, $quantity, $discount)
{
    $prodCataCart = new ProductCatalogCart;
    $prodCataCart->setProductCatalog($product)
        ->setCart($cart)
        ->setQuantity($quantity)
        ->setDiscount($discount);

    $manager->persist($prodCataCart);
}

class CustomerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $products = array(
            dataProduct($manager, "Desktop computer", 1, "Dell", 1, 2, 1, 400000, 10),
            dataProduct($manager, "Laptop computer", 1, "Dell", 1, 1, 1, 1000000, 3),
            dataProduct($manager, "Laptop computer", 2, "Apple", 2, 1, 1, 800000, 3),
            dataProduct($manager, "Laptop computer", 3, "Acer", 1, 2, 1, 800000, 3),
            dataProduct($manager, "Laptop computer", 4, "Lenovo", 1, 2, 1, 900000, 3)
        );

        /*1*/
        $customer = dataCustomer($manager, "Sahondra", "RAKOTOZAFY", date_create(1985 - 01 - 02), "F", 1, 1, 1, 1);
        dataPhone($manager, $customer, "1", "261", "334522228", NULL, "Mobile", true);
        dataPhone($manager, $customer, "1", "261", "345689712", NULL, "Work", false);
        dataPhone($manager, $customer, "1", "261", "322154137", NULL, "Fax", false);
        dataEmail($manager, $customer, "sahondra@gmail.com", "Personal", true);
        dataEmail($manager, $customer, "sahondra@yahoo.com", "Work", false);
        dataAddress($manager, $customer, "Lot IVB 45 Ambohimanarina", NULL, "Antananarivo", "MG", 11717, "MADAGASCAR", "Home", true);
        dataAddress($manager, $customer, "Lot 65 Analakely", NULL, "Antananarivo", "MG", 11717, "MADAGASCAR", "Work", false);
        $payment = dataPayment($manager, $customer, "368544623795203", "American Express", NULL, 11, 2022, 4764, true);
        $orderDetails = dataOrderDetails($manager, $customer, $payment, date_create(2019 - 12 - 20), date_create(2019 - 12 - 20), date_create(2019 - 12 - 20), "FedEx Ground", date_create(2019 - 12 - 20), NULL, NULL);
        $cart = dataCart($manager, $orderDetails, "my cart1");
        dataProductCatalogCart($manager, $products[2], $cart, 5, NULL);
        dataProductCatalogCart($manager, $products[4], $cart, 2, NULL);
        /*2*/
        $customer = dataCustomer($manager, "John", "Ancona", date_create(1987 - 3 - 23), "M", 3, 4, 3, 2);
        dataPhone($manager, $customer, "1", "203", "779-6292", NULL, "Mobile", true);
        dataEmail($manager, $customer, "ancona123@hotmail.com", "Personal", true);
        dataEmail($manager, $customer, "ancona@urw.edu", "School", false);
        dataAddress($manager, $customer, "82 Roosevelt Rd", NULL, "Miami", "FL", 33125, "USA", "Home", true);
        $payment = dataPayment($manager, $customer, "4937515149549500", "Visa", NULL, 9, 2024, 321, true);
        $orderDetails = dataOrderDetails($manager, $customer, $payment, date_create(2019 - 4 - 1), date_create(2019 - 4 - 1), date_create(2019 - 4 - 1), "UPS Next Day", date_create(2019 - 4 - 5), NULL, NULL);
        $cart = dataCart($manager, $orderDetails, "my cart2");
        dataProductCatalogCart($manager, $products[2], $cart, 1, NULL);
        /*3*/
        $customer = dataCustomer($manager, "Sedra", "RANARISOA", date_create(1991 - 10 - 6), "M", 4, 5, 5, NULL);
        dataPhone($manager, $customer, "1", "261", "345458714", NULL, "Mobile", true);
        dataEmail($manager, $customer, "sedra@yahoo.com", "Personal", true);
        dataAddress($manager, $customer, "Lot 145 Soanierana", NULL, "Toamasina", "MG", 34135, "MADAGASCAR", "Home", true);
        /*4*/
        $customer = dataCustomer($manager, "Jane", "Zheng", date_create(1989 - 8 - 16), "F", 5, 6, 6, 3);
        dataPhone($manager, $customer, "1", "554", "774-1089", 123, "Mobile", true);
        dataEmail($manager, $customer, "jane@aol.com", "Personal", true);
        dataAddress($manager, $customer, "34 W. James Dr", "Apt7", "Altoona", "PA", 16601, "USA", "Home", true);
        dataPayment($manager, $customer, "4828526348154572", "Visa", NULL, 4, 2023, 987, true);
        $orderDetails = dataOrderDetails($manager, $customer, $payment, date_create(2019 - 3 - 8), date_create(2019 - 3 - 8), date_create(2019 - 3 - 8), "USPS Media Mail", date_create(2019 - 3 - 15), date_create(2019 - 3 - 20), NULL);
        $cart = dataCart($manager, $orderDetails, "my cart3");
        dataProductCatalogCart($manager, $products[2], $cart, 2, NULL);
        /*5*/
        $customer = dataCustomer($manager, "Rosa", "Hernandez", date_create(1996 - 8 - 19), "F", 6, 7, 7, 4);
        dataPhone($manager, $customer, "1", "556", "304-3971", NULL, "Mobile", true);
        dataEmail($manager, $customer, "rosa@aim.com", "Personal", true);
        dataAddress($manager, $customer, "68 Ohio Street", NULL, "Mableton", "GA", 30126, "USA", "Home", true);
        dataPayment($manager, $customer, "4248168108403535", "Visa", NULL, 12, 2020, 159, true);
        $orderDetails = dataOrderDetails($manager, $customer, $payment, date_create(2020 - 5 - 20), date_create(2020 - 5 - 20), date_create(2020 - 5 - 21), "USPS Registered Mail", NULL, NULL, NULL);
        $cart = dataCart($manager, $orderDetails, "my cart4");
        dataProductCatalogCart($manager, $products[2], $cart, 1, NULL);

        $manager->flush();
    }
}
