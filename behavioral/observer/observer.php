<?php

/**
 *  Пользователь представляет собой Издателя. Различные объекты
 *  заинтересованы в отслеживании его внутреннего состояния, будь то добавление
 *  нового пользователя или его удаление.
 */
class User implements SplSubject
{
    // Специальная группа событий для наблюдателей, которые хотят слушать
    // все события.
    private SplObjectStorage $observers;
    public string $name;
    private string $email;
    public function __construct($name, $email)
    {
        $this->observers = new SplObjectStorage();
        $this->name = $name;
        $this->email = $email;
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function changeName(string $name): void
    {
        $this->name = $name;
        $this->notify("changed name to $name");
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function changeEmail(string $email): void
    {
        $this->email = $email;
        $this->notify("changed email to $email");
    }

    public function notify(string $event = "*", $data = null): void
    {
        /** @var SplObserver $observer **/
        foreach ($this->observers as $observer) {
            $observer->update($this, $event);
        }
    }
}

/**
 * Наблюдатель регистрирует все события, на которые он подписан.
 */
class UserObserver implements SplObserver
{
    /**
     * @var SplSubject[]
     */
    private array $changedUsers = [];

    /**
     * It is called by the Subject, usually by SplSubject::notify()
     */
    public function update(SplSubject $subject, string $event = null): void
    {
        $this->changedUsers[] = clone $subject;
        echo date("Y-m-d H:i:s") . ": User $subject->name has $event <br>";
    }

    /**
     * @return SplSubject[]
     */
    public function getChangedUsers(): array
    {
        return $this->changedUsers;
    }
}