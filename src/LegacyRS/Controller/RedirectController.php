<?php
/**
 * Created by PhpStorm.
 * User: Clayton Daley
 * Date: 3/12/2015
 * Time: 8:41 PM
 */

namespace LegacyRS\Controller;

use Zend\Http\Response;

class RedirectController extends LegacyRSController
{
    /**
     * Array of redirect configurations.  Each provides redirection logic for specific 'names' like login, logout,
     * userProfile, adminUserList, adminUserEdit, etc.
     *
     * @var array $outeOverrides
     */
    protected $routeOverrides;

    public function __construct($overrides=array())
    {
        $this->routeOverrides = $overrides;
    }

    /**
     * LegacyRS uses the following javascript to refresh the whole page if it receives an AJAX (ajax=true) request. This
     * action replicates that functionality to ensure that ZF2-provided pages are not rendered inside the AJAX region.
     *
     * @param string $route
     * @param array $params
     * @param array $query
     * @return Response
     */
    public function bustAjaxAction($route, $params=array(), $query=array())
    {
        # bust ajax using javascript
        /** @var Response $response */
        $response = $this->getResponse();
        $response->setStatusCode(Response::STATUS_CODE_200);
        $response->setContent('<script type="text/javascript">top.location.href="' .
            $this->url()->fromRoute($route, $params, $query) . '";</script>');
        return $response;
    }

    /**
     * Framework to hijack and redirect LegacyRS pages.
     * @param string $route
     * @param array $params
     * @param array $query
     * @return Response
     */
    public function redirectAction($route='legacyrs', $params=array(), $query=array())
    {
        # Preserve ajax parameter
        if ($this->getRequest()->getQuery('ajax', false) === "true") {
            $query['ajax'] = "true";
        }

        # Respond with redirect
        return $this->redirect()->toRoute(
            $route,
            $params,
            array( #options
                'query' => $query
            )
        );
    }

    public function defaultAction($redirect = null)
    {
        # If route doesn't exist, try lookup by name
        if ($redirect === null) {
            $redirect = $this->getRoute($this->params()->fromRoute('name', null));
        }

        # If route is bad
        if ($redirect === null or !array_key_exists('route', $redirect) || !is_string($redirect['route'])) {
            return $this->legacyAction();
        }

        # Move query params
        $params = array();
        if (array_key_exists('parameterize', $redirect)) {
            foreach ($redirect['parameterize'] as $query => $param) {
                if ($this->getRequest()->getQuery($query) !== null)
                $params[$param] = $this->getRequest()->getQuery($query);
            }
        }

        # Move query params
        $query = array();
        if (array_key_exists('requery', $redirect)) {
            foreach ($redirect['requery'] as $old_query => $new_query) {
                if ($this->getRequest()->getQuery($old_query) !== null)
                    $params[$new_query] = $this->getRequest()->getQuery($old_query);
            }
        }

        # If ajax is present but not permitted, bust ajax
        if ($this->getRequest()->getQuery('ajax') === "true" and
        (array_key_exists('ajax', $redirect) and $redirect['ajax'] === false))
        {
            return $this->bustAjaxAction($redirect['route'], $params, $query);
        } else {
            return $this->redirectAction($redirect['route'], $params, $query);
        }
    }

    public function authAction()
    {
        # Correct route based on query parameter
        if ($this->getRequest()->getQuery('logout', false) === 'true') {
            $redirect = $this->getRoute('logout');
        } else {
            $redirect = $this->getRoute('login');
        }

        # If route is bad
        if ($redirect === null or !array_key_exists('route', $redirect) || !is_string($redirect['route'])) {
            return $this->legacyAction();
        }

        return $this->defaultAction($redirect);
    }

    public function setRouteOverrides(array $overrides)
    {
        $this->routeOverrides = $overrides;
    }

    public function addRouteOverride($name, array $route)
    {
        $this->routeOverrides[$name] = $route;
    }

    public function removeRouteOverride($name)
    {
        unset($this->routeOverrides[$name]);
    }

    public function getRoute($name)
    {
        if (array_key_exists($name, $this->routeOverrides))
        {
            return $this->routeOverrides[$name];
        } else {
            return null;
        }

    }
}
