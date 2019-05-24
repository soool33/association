<?php
namespace App\Controller;

use App\Controller\DefaultController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
 
class DefaultController extends Controller
{
    /**
     * @Route("/admin/", name="admin_page")
     */
    public function adminPageAction()
    {
        return $this->render('admin.html.twig');
    }

    /**
     * @Route("/user", name="user_info")
     * 
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function showUserAction()
    {
        if($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')){
            return $this->render('admin.html.twig');
        }

        if($this->get('security.authorization_checker')->isGranted('ROLE_USER')){
            return $this->render('base.html.twig');
        }
    }
}
