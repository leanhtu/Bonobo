<?php
namespace AppBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Relation;
use AppBundle\Entity\User;
use AppBundle\Entity\Login;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller{
    

    public function loginAction(Request $request)
  {
     if($request->getMethod()=='POST')
     {
        $session = $this->getRequest()->getSession();
        $session->clear();
        $username=$request->get('username');
        $password=$request->get('password');
        $remember=$request->get('remember');

        $em=$this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('AppBundle:User');
        $user = $repository->findOneBy(array('userName'=>$username, 'userPassword'=>$password));

        if($user)
        {
            if($remember == 'remember_me')
            {
                $login = new Login();
                $login->setUserName($username);
                $login->setUserPassword($password);
                $session->set('login', $login);
            }
            return $this->render(':User:accueil.html.twig', array(
                'name' => $user->getUserName(), 
                'id'=>$user->getUserId(),
                'age'=>$user->getUserAge(),
                'famille'=>$user->getUserFamille(),
                'race'=>$user->getUserRace()
                ));
        }
        else
        {
            return $this->render(':User:login.html.twig', array('name' => 'login failed'));
        }
     }
     return $this->render(':User:login.html.twig');  
  }


    public function logoutAction()
    {
        $session = $this->getRequest()->getSession();
        $session->clear();
        return $this->render(':User:login.html.twig');
    }



    public function afficheAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:User');
        $query = $repository->createQueryBuilder('t')
        ->select('t')
        ->innerJoin('AppBundle:Relation', 'r')
        ->where('t.userId = r.friend1 AND r.friend2Id = :id')
        ->setParameter('id', $id)
        ->getQuery();
        $posts = $query->getResult();    
        
        return $this->render(':User:list.html.twig', [
            'posts' => $posts
            ]);
    }
    
    public function deleteAction($id1)
    {
        $em=$this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('AppBundle:Relation');
        $relation = $repository->findOneBy(array('friend1'=>$id1));
        $em->remove($relation);
        $em->flush();
        return new Response('User delete');
    }   

    public function findAction(Request $request)
    {
        if($request->getMethod()=='POST')
     {
        $username=$request->get('username');
        $em=$this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('AppBundle:User');
        $user = $repository->findOneBy(array('userName'=>$username));
        if($user)
        {
            return $this->render(':User:find.html.twig', array(
                'idFriend' => $user->getUserId(),
                'nameFriend' => $user->getUserName(), 
                'ageFriend'=>$user->getUserAge(),
                'familleFriend'=>$user->getUserFamille(),
                'raceFriend'=>$user->getUserRace()
                ));
        }
        else
        {
            return $this->render(':User:accueil.html.twig', array('name' => 'user not exist'));
        }
    return $this->render(':User:accueil.html.twig');  
  }        
   
}
     public function addFriendAction(Request $request)
    {
        if($request->getMethod()=='POST')
     {
        $relation = new Relation();
        $yourId=$request->request->get('userid1');
        $friendId=$request->request->get('userid2');

       
        $relation->setFriend2Id($yourId);
        
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneBy(array('userId'=>$friendId));
        $relation->addUser($user);

        
        $em->persist($relation);
        
        $em->flush();

        return new Response("Add Success");
         
  }        
   }
   }