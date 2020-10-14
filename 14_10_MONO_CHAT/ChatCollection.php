<?php


class ChatCollection extends Database
{
    protected string $path;
    private array $chat;

    public function getChat(): array
    {
        return $this->chat;
    }

    protected function load(): void
    {
        $file = fopen($this->path, 'r');

        while (($message = fgetcsv($file)) !== false) {
            $this->chat[] = ['id' => $message[0], 'msg' => $message[1]];
        }
        fclose($file);
    }

    public function saveMessage(string $id, string $message): void
    {
        $file = fopen($this->path, 'a');
        fputcsv($file, [$id, $message]);

        fclose($file);
    }


}