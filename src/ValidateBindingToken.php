<?php declare(strict_types=1);

namespace App;

use Symfony\Component\HttpFoundation\Request;

/**
 * Validate the supplied
 */
class ValidateBindingToken
{
    private $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function isValid(Request $request): bool
    {
        $validReferences = [
            $request->request->get('token'),
            $request->query->get('token'),
            $request->headers->get('x-webhook-token')
        ];
        return in_array($this->token, $validReferences, true);
    }
}