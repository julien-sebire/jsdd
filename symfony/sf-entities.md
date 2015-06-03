# Entities

sfge -> nom de l'entité (LignehTenderBundle:Deal) yml -> add fields
-> ça crée l'Entity/Entity.php et le Resources/config/doctrine/Entity.orm.yml


# Relations

Dans le yml :

- donner le nom de la table



- ajouter les relations :

un Owner a plusieurs Deals :
  dans Deal.orm.yml :

```yml
    manyToOne:
        owner:
            targetEntity: Owner
            inversedBy: deals
```

  le symétrique dans Owner.orm.yml :

```yml
    oneToMany:
        deals:
            targetEntity: Deal
            mappedBy: owner
```

générer les entités :
sf g:d:entities --path=src Ligneh
(TODO : alias)

Réordonner les propriétés et méthodes dans la classe entité

ajouter une méthode pour la collection et l'initialisation dans le constructeur :

Dans Owner.php :

    public function __construct()
    {
        $this->deals = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set deals
     *
     * @param \Doctrine\Common\Collections\Collection $deals
     * @return Owner
     */
    public function setDeal(\Doctrine\Common\Collections\Collection $deals)
    {
        $this->deals = $deals;

        return $this;
    }


supprimer les *.php~ dans Bundle/Entity

update la base

sfdu



Créer les fixtures : voir modèle
Penser à changer le type d'objet, faire les références éventuelles aux objets reliés en amont et en aval :

                // Relations.
                -> setOwner($this -> parseReference('tender_owner-', $data[$i]['id_owner']))
            ;

            // Keeps a reference to the object for Package fixture.
            $this->addReference('tender_deal-' . $object -> getRef(), $object);

penser à changer le n° d'ordre


/*/
not used anymore, howto keep id's, with setId
-> setId($data[$i]['id'])
            // Keeps id's.
            $metadata = $em -> getClassMetaData(get_class($object));
            $metadata -> setIdGenerator(new \Doctrine\ORM\Id\AssignedGenerator());

between
$em -> persist($object);
and
$em -> flush();

/*/




Créer les fichiers de données ( à partir de mysql ou excel en csv par ex)
lancer les fixtures

sfdf
