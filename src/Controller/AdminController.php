<?php

namespace App\Controller;

use App\Entity\ServicesCategory;
use App\Entity\ServicesSubCategory;
use App\Form\ServicesCategoryType;
use App\Form\ServicesSubCategoryType;
use App\Repository\ServicesCategoryRepository;
use App\Repository\ServicesSubCategoryRepository;
use Swift_Mailer;
use Swift_Message;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\User;

use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

use App\Repository\ServiceRepository;
use App\Entity\Service;
use App\Form\ServiceType;

use App\Repository\CarRepository;
use App\Entity\Car;
use App\Form\CarType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use App\Entity\Order;


/**
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/", name="admin_index")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $orders = $em->getRepository(Order::class)->findAll();

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'Admin',
            'car_orders' => $orders
        ]);
    }

    // Clients

    /**
     * @Route("/clients", name="admin_clients")
     */
    public function showClients()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository(User::class)->findAll();

        return $this->render('admin/client_admin.html.twig', [
            'controller_name' => 'Your Clients', 'clients' => $users,
        ]);
    }

    /**
     * @Route("/deactivate/{name}", name="admin_deactivate")
     */
    public function deactivateClient($name, KernelInterface $kernel)
    {
        $application = new Application($kernel);

        $application->setAutoExit(false);

        $input = new ArrayInput(array(
            'command' => 'fos:user:deactivate',
            // (optional) define the value of command arguments
            'username' => $name
        ));

        // You can use NullOutput() if you don't need the output
        $output = new BufferedOutput();

        $application->run($input, $output);

//        $content = $output->fetch();
//
//        return new Response($content);

        return $this->redirectToRoute('admin_clients');
    }

    /**
     * @Route("/activate/{name}", name="admin_activate")
     */
    public function activateClient($name, KernelInterface $kernel)
    {
        $application = new Application($kernel);

        $application->setAutoExit(false);

        $input = new ArrayInput(array(
            'command' => 'fos:user:activate',
            // (optional) define the value of command arguments
            'username' => $name
        ));

        // You can use NullOutput() if you don't need the output
        $output = new BufferedOutput();

        $application->run($input, $output);

//        $content = $output->fetch();
//
//        return new Response($content);

        return $this->redirectToRoute('admin_clients');
    }

    // Services

    /**
     * @Route("/services", name="admin_services", methods="GET")
     */
    public function showServices(ServiceRepository $serviceRepository): Response
    {
        return $this->render('admin/service_index_admin.html.twig', ['controller_name' => 'Your Services', 'services' => $serviceRepository->findAll()]);
    }

    /**
     * @Route("/service/{id}", name="admin_service_show", methods="GET", requirements={"id"="\d+"})
     */
    public function showService(Service $service): Response
    {
        return $this->render('admin/service_show_admin.html.twig', ['service' => $service]);
    }

    /**
     * @Route("/service/{id}/edit", name="admin_service_edit", methods="GET|POST", requirements={"id"="\d+"})
     */
    public function editService(Request $request, Service $service): Response
    {
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_services');
        }

        return $this->render('admin/service_edit_admin.html.twig', [
            'service' => $service,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/service/new", name="admin_service_new", methods="GET|POST")
     */
    public function newService(Request $request): Response
    {
        $service = new Service();
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($service);
            $em->flush();

            return $this->redirectToRoute('admin_services');
        }

        return $this->render('admin/service_new_admin.html.twig', [
            'service' => $service,
            'form' => $form->createView(),
            'controller_name' => 'New Service'
        ]);
    }

    /**
     * @Route("/service/{id}/delete", name="admin_service_delete", requirements={"id"="\d+"}, methods="DELETE")
     */
    public function deleteService(Request $request, Service $service): Response
    {
        if ($this->isCsrfTokenValid('delete'.$service->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($service);
            $em->flush();
        }

        return $this->redirectToRoute('admin_services');
    }

    // Car

    /**
     * @Route("/cars", name="admin_cars", methods="GET")
     */
    public function showCars(CarRepository $carRepository): Response
    {
        return $this->render('admin/car_index_admin.html.twig', ['cars' => $carRepository->findAll()]);
    }

    /**
     * @Route("/car/{id}", name="admin_car_show", requirements={"id"="\d+"}, methods="GET")
     */
    public function showCar(Car $car): Response
    {
        return $this->render('admin/car_show_admin.html.twig', ['car' => $car]);
    }

    /**
     * @Route("/car/{id}/user", name="admin_car_user", methods="GET")
     */
    public function showCarUser(Car $car): Response
    {

        $user = $car->getUser();

        return $this->render('admin/user_show_admin.html.twig', ['user' => $user]);
    }

    // Category

    /**
     * @Route("/category", name="admin_services_category_index", methods="GET")
     */
    public function showCategory(ServicesCategoryRepository $categoryRepository): Response
    {
        return $this->render('admin/services_category/index.html.twig', ['services_categories' => $categoryRepository->findAll()]);
    }

    /**
     * @Route("/category/new", name="admin_services_category_new", methods="GET|POST")
     */
    public function catNew(Request $request): Response
    {
        $servicesCategory = new ServicesCategory();
        $form = $this->createForm(ServicesCategoryType::class, $servicesCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($servicesCategory);
            $em->flush();

            return $this->redirectToRoute('admin_services_category_index');
        }

        return $this->render('admin/services_category/new.html.twig', [
            'services_category' => $servicesCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/category/{id}", name="admin_services_category_show", methods="GET")
     */
    public function catShow(ServicesCategory $servicesCategory): Response
    {
        return $this->render('admin/services_category/show.html.twig', ['services_category' => $servicesCategory]);
    }

    /**
     * @Route("/category/{id}/edit", name="admin_services_category_edit", methods="GET|POST")
     */
    public function catEdit(Request $request, ServicesCategory $servicesCategory): Response
    {
        $form = $this->createForm(ServicesCategoryType::class, $servicesCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_services_category_edit', ['id' => $servicesCategory->getId()]);
        }

        return $this->render('admin/services_category/edit.html.twig', [
            'services_category' => $servicesCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/category/{id}", name="admin_services_category_delete", methods="DELETE")
     */
    public function catDelete(Request $request, ServicesCategory $servicesCategory): Response
    {
        if ($this->isCsrfTokenValid('delete'.$servicesCategory->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($servicesCategory);
            $em->flush();
        }

        return $this->redirectToRoute('admin_services_category_index');
    }

    //------------------------------------------------------------------------------------------------------------------------
    // Subcategory

    /**
     * @Route("/services/sub/category", name="admin_services_sub_category_index", methods="GET")
     */
    public function subIndex(ServicesSubCategoryRepository $servicesSubCategoryRepository): Response
    {
        return $this->render('admin/services_sub_category/index.html.twig', ['services_sub_categories' => $servicesSubCategoryRepository->findAll()]);
    }

    /**
     * @Route("/services/sub/category/new", name="admin_services_sub_category_new", methods="GET|POST")
     */
    public function subNew(Request $request): Response
    {
        $servicesSubCategory = new ServicesSubCategory();
        $form = $this->createForm(ServicesSubCategoryType::class, $servicesSubCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($servicesSubCategory);
            $em->flush();

            return $this->redirectToRoute('admin_services_sub_category_index');
        }

        return $this->render('admin/services_sub_category/new.html.twig', [
            'services_sub_category' => $servicesSubCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/services/sub/category/{id}", name="admin_services_sub_category_show", methods="GET")
     */
    public function subShow(ServicesSubCategory $servicesSubCategory): Response
    {
        return $this->render('admin/services_sub_category/show.html.twig', ['services_sub_category' => $servicesSubCategory]);
    }

    /**
     * @Route("/services/sub/category/{id}/edit", name="admin_services_sub_category_edit", methods="GET|POST")
     */
    public function subEdit(Request $request, ServicesSubCategory $servicesSubCategory): Response
    {
        $form = $this->createForm(ServicesSubCategoryType::class, $servicesSubCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_services_sub_category_edit', ['id' => $servicesSubCategory->getId()]);
        }

        return $this->render('admin/services_sub_category/edit.html.twig', [
            'services_sub_category' => $servicesSubCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/services/sub/category/{id}", name="admin_services_sub_category_delete", methods="DELETE")
     */
    public function subDelete(Request $request, ServicesSubCategory $servicesSubCategory): Response
    {
        if ($this->isCsrfTokenValid('delete'.$servicesSubCategory->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($servicesSubCategory);
            $em->flush();
        }

        return $this->redirectToRoute('admin_services_sub_category_index');
    }

    //--------------------------------------------------------------------------------

    /**
     * @Route("/order/{id}/services", name="admin_order_services", requirements={"id"="\d+"}, methods="GET")
     */
    public function showOrderedServices(Order $order): Response
    {
        $services = $order->getServices();
        return $this->render('admin/service_orders_admin.html.twig', ['services' => $services, 'controller_name' => 'Ordered services', 'car' => $order->getCar()]);
    }

    /**
     * @Route("/order/{id}/all_done/{slug}", name="admin_order_done", requirements={
     *     "id"="\d+",
     *      "slug": "\d+"
     * }, methods="GET|POST")
     */
    public function markCarAsDone(Car $car, Swift_Mailer $mailer,$slug): Response
    {
        $message = (new Swift_Message('Your car is repaired'))
            ->setFrom($car->getUser()->getEmailCanonical())
            ->setTo($car->getUser()->getEmail())
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    'email/car_done.html.twig',
                    array('name' => $car->getUser()->getUsernameCanonical())
                ),
                'text/html'
            );
        $mailer->send($message);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('order_done',array('id' => $slug));
    }


}