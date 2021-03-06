<?php

namespace Nicklas\Comment\HTMLForm\Comment;

use \Anax\HTMLForm\FormModel;
use \Anax\DI\DIInterface;
use \Nicklas\Comment\Modules\User;
use \Nicklas\Comment\Modules\Comment;

/**
 * Form to update an item.
 */
class EditCommentForm extends FormModel
{
    /**
     * Constructor injects with DI container and the id to update.
     *
     * @param Anax\DI\DIInterface $di a service container
     * @param integer             $id to update
     */
    public function __construct(DIInterface $di, $id)
    {
        parent::__construct($di);
        $this->comment = new Comment($di->get("db"));
        $this->comment->find("id", $id);
        if ($this->comment->id == null) {
            $di->get("response")->redirect("question");
        }
        $this->form->create(
            [
                "id" => __CLASS__,
                "legend" => "Här kan du uppdatera din kommentar"
            ],
            [
                "text" => [
                    "type" => "textarea",
                    "validation" => ["not_empty"],
                    "value" => $this->comment->text,
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Spara",
                    "callback" => [$this, "callbackSubmit"]
                ],
            ]
        );
    }




    /**
     * Callback for submit-button which should return true if it could
     * carry out its work and false if something failed.
     *
     * @return void
     */
    public function callbackSubmit()
    {
        // Get values from the submitted form
        $text = $this->form->value("text");

        if (!$this->di->get('session')->has("user")) {
            $this->form->addOutput("Du behöver logga in");
            return false;
        }

        $user = new User($this->di->get("db"));
        if ($user->controlAuthority($this->di->get('session')->get("user"), $this->comment->user) != true) {
            $this->form->addOutput("Du får inte redigera denna.");
            return false;
        }

        if ($text == "") {
            $this->form->addOutput("Du skrev aldrig något. Skriv gärna något.");
            return false;
        }

        $this->comment->text = $text;
        $this->comment->save();
        $this->form->addOutput("Du har uppdaterat kommentaren");
        return true;
    }
}
