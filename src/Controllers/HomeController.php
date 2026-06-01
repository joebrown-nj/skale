<?php

namespace App\Controllers;

use App\Core\Contracts\EmailServiceInterface;
use App\Core\Contracts\ViewInterface;
use App\Models\HomePageModel;
use App\Models\BlogModel;
use App\Models\PageContentModel;
use App\Models\HomeCardsModel;

class HomeController
{
 private HomePageModel $homePageModel;
 private HomeCardsModel $homeCardsModel;
 private BlogModel $blogModel;
 private PageContentModel $pageContentModel;
 private EmailServiceInterface $emailModel;
 private ViewInterface $view;

 public function __construct(HomePageModel $homePageModel, HomeCardsModel $homeCardsModel, PageContentModel $pageContentModel, BlogModel $blogModel, EmailServiceInterface $emailModel, ViewInterface $view) {
 $this->homePageModel = $homePageModel;
 $this->homeCardsModel = $homeCardsModel;
 $this->pageContentModel = $pageContentModel;
 $this->blogModel = $blogModel;
 $this->emailModel = $emailModel;
 $this->view = $view;
 }

 public function index()
 {
 // $wCU = $this->homePageModel->getWhyChooseUsContent();
 $blogPage = $this->pageContentModel->getPageContentByUrl('blog');

 $data = array(
 'hero' => $this->homePageModel->getHeroContent(),
 'homeCards' => $this->homeCardsModel->getHomeCards(),
 'blogContent' => $blogPage !== false ? $blogPage['content'] : null,
 'blogFeatured' => $this->blogModel->getFeaturedBlog(),
 'blogList' => $this->blogModel->getAllBlogs(),
 'howItWorks' => $this->homePageModel->getHowItWorksContent(),
 'theResults' => $this->homePageModel->getTheResultsContent(),
 );

 $this->view->render('home', $data);
 }

 public function unsubscribe()
 {
 $successMessage = '';
 $errorMessage = '';

 if(!isset($_GET['email']) || !$this->emailModel->validateEmail($_GET['email'])){
 $errorMessage = 'A valid email is required to unsubscribe';
 } else {
 if($this->emailModel->emailListUnsubscribe($_GET['email'])){
 $successMessage = 'You have been unsubscribed';
 } else {
 $errorMessage = 'There was a problem unsubscribing you. Please try again later.';
 }
 }

 $this->view->render('unsubscribe', array(
 'successMessage' => $successMessage,
 'errorMessage' => $errorMessage
 )
 );
 }
}
