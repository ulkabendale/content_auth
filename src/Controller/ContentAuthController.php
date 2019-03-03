<?php

namespace Drupal\content_auth\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * An example controller.
 */
class ContentAuthController extends ControllerBase {

  /**
   * Returns a render-able array for a test page.
   */
  public function content($apikey, $nid) {
    
    $config = \Drupal::config('content_auth.settings');
    $api_key = $config->get('siteapikey');

    $entityObj = entity_load('node',$nid);
    if (!empty($entityObj)) {
        $bundle = $entityObj->bundle();
        if($apikey == $api_key && $bundle == 'page') {

            $json_array = array(
                'data' => array()
            );
            $node = Node::load($nid);
            $json_array['data'][] = array(
                'type' => $node->get('type')->target_id,
                'id' => $node->get('nid')->value,
                'attributes' => array(
                'title' =>  $node->get('title')->value,
                'content' => $node->get('body')->value,
                'test' => $node->getContent,
                ),
            );
            return new JsonResponse($json_array);
        } else {
            throw new AccessDeniedHttpException();
        }
    } else {
        throw new AccessDeniedHttpException();
    }
  
  }

}