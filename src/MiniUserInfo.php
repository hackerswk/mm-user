<?php
/**
 * Ministore member info class
 *
 * @author      Stanley Sie <swookon@gmail.com>
 * @access      public
 * @version     Release: 1.0
 */

namespace Stanleysie\MmUser;

use \PDO as PDO;

class MiniUserInfo
{
    /**
     * database
     *
     * @var object
     */
    private $database;

    /**
     * initialize
     */
    public function __construct($db = null)
    {
        $this->database = $db;
    }

    /**
     * get user info
     *
     * @param int $member_id
     * @return array
     */
    public function getUserInfo($member_id = null)
    {
        $sql = <<<EOF
            SELECT * FROM ministore_members
            WHERE id = :member_id
EOF;
        $query = $this->database->prepare($sql);
        $query->execute([
            ':member_id' => $member_id,
        ]);

        if ($query->rowCount() > 0) {
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $result = [
                'id' => $row['id'],
                'site_id' => $row['site_id'],
                'user_id' => $row['id'],
                'user_email' => $row['email'],
                'registered_method' => $row['registered_method'],
                'provider_type' => $row['provider_type'],
                'user_detail' => $this->getUserDetail($member_id) ?? [],
                'user_shipping_info' => $this->getUserShippingInfo($member_id) ?? [],
                'user_site_level' => $this->getUserSiteLevel($member_id) ?? [],
            ];

            return $result;
        }

        return [];
    }

    /**
     * Get member detail.
     *
     * @param int $member_id
     * @return array
     */
    public function getUserDetail($member_id)
    {
        $sql = <<<EOF
            SELECT * FROM member_detail
            WHERE member_id = :member_id
EOF;
        $query = $this->database->prepare($sql);
        $query->execute([
            ':member_id' => $member_id
        ]);
        $result = [];
        if ($query->rowCount() > 0) {
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        return $result;
    }


    /**
     * Get member shipping info.
     *
     * @param int $member_id
     * @return array
     */
    public function getUserShippingInfo($member_id)
    {
        $sql = <<<EOF
            SELECT * FROM member_shipping_info
            WHERE member_id = :member_id
EOF;
        $query = $this->database->prepare($sql);
        $query->execute([
            ':member_id' => $member_id
        ]);
        $result = [];
        if ($query->rowCount() > 0) {
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        return $result;
    }


    /**
     * Get member site level.
     *
     * @param int $member_id
     * @return array
     */
    public function getUserSiteLevel($member_id)
    {
        $sql = <<<EOF
            SELECT * FROM site_member_level
            WHERE member_id = :member_id
EOF;
        $query = $this->database->prepare($sql);
        $query->execute([
            ':member_id' => $member_id
        ]);
        $result = [];
        if ($query->rowCount() > 0) {
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        return $result;
    }

}
