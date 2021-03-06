<?php

namespace YWatchman\Panel_Console\Requests;

use Pterodactyl\Http\Requests\Api\Client\ClientApiRequest;
use Pterodactyl\Models\Server;

class CreateFolderRequest extends ClientApiRequest
{
    /**
     * Checks that the authenticated user is allowed to create files on the server.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('create-files', $this->getModel(Server::class));
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'root' => 'sometimes|nullable|string',
            'name' => 'required|string',
        ];
    }
}
