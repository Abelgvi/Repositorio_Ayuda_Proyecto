<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LdapAdmin
{
    /**
     * Este middleware protege rutas que solo los administradores LDAP pueden ver.
     *
     * Los admins NO existen en MySQL, así que NO usamos Auth::user().
     * En su lugar, comprobamos si existe la variable de sesión 'ldap_admin',
     * que se establece cuando un admin se autentica correctamente vía LDAP.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si NO hay admin LDAP en sesión → acceso denegado
        if (!session()->has('ldap_admin')) {
            abort(403, 'Acceso restringido solo para administradores.');
        }

        // Si sí hay admin LDAP → permitir acceso
        return $next($request);
    }
}