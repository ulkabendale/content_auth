<?php

namespace Drupal\content_auth\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * A controller.
 */
class ContentAuthController extends ControllerBase {

  /**
   * Returns a json array of a node.
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
                ),
            );

            return new JsonResponse($json_array);
        } else {
            // Access denied permission
            throw new AccessDeniedHttpException();
        }
    } else {
            // Access denied permission
            throw new AccessDeniedHttpException();
    }
  
  }

}