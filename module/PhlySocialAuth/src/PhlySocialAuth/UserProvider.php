<?php
namespace PhlySocialAuth;

use ScnSocialAuth\Mapper;

class UserProvider extends Mapper\UserProvider
{
    public function findUserByProviderId($providerId, $provider)
    {
        $sql    = $this->getSql();
        $select = $sql->select();
        $select->from($this->tableName)
               ->where(array(
                   'provider_id' => $providerId,
                   'provider'    => $provider,
               ));

        $entity = $this->select($select)->current();
        $this->getEventManager()->trigger('find', $this, array('entity' => $entity));

        return $entity;
    }
}
