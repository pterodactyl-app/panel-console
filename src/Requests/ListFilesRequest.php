<?php

namespace YWatchman\Panel_Console\Requests;

use Pterodactyl\Http\Requests\Api\Client\ClientApiRequest;
use Pterodactyl\Models\Server;

class ListFilesRequest extends ClientApiRequest
{
    /**
     * Check that the user making this request to the API is authorized to list all
     * of the files that exist for a given server.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('list-files', $this->getModel(Server::class));
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'directory' => 'sometimes|nullable|string',
        ];
    }
}
