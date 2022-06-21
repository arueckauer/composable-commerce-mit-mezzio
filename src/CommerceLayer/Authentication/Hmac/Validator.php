<?php

declare(strict_types=1);

namespace CommerceLayer\Authentication\Hmac;

use ErrorException;
use Throwable;

use function base64_encode;
use function hash_hmac;
use function restore_error_handler;
use function set_error_handler;

use const E_WARNING;

class Validator
{
    private const ALGORITHM = 'sha256';

    public function invoke(
        string $sharedSecret,
        string $signature,
        string $payload
    ): bool {
        try {
            set_error_handler(static function (
                $level,
                $message
            ) {
                throw new ErrorException($message);
            }, E_WARNING);

            $message = hash_hmac(
                self::ALGORITHM,
                $payload,
                $sharedSecret,
                true
            );
        } catch (Throwable) {
            restore_error_handler();

            return false;
        }

        restore_error_handler();

        if (false === $message) {
            return false;
        }

        $calculatedSignature = base64_encode($message);

        return $calculatedSignature === $signature;
    }
}
