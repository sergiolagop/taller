<?php

class Menu_model extends CI_Model
{
    function __construct() {
        parent::__construct();
    }

    function index() {
        
    }
    function get_logo($id_empresa){
        $sql = "SELECT logo from empresas WHERE id = $id_empresa";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function get_menus($id_usuario=1) {

            $sql = "SELECT m.id as id_modulo,m.nombre as nombre_modulo, 
                    m.controlador, m.metodo, m.id_padre, m.icon, 
                    g.id as id_grupo, g.name as nombre_grupo, 
                    u.id as id_usuario, u.email as email_user, 
                    p.id as id_persona, p.nombre as nombre_persona
                    FROM modulos m 
                    INNER JOIN groups_modulos gm ON m.id=gm.id_modulos 
                    INNER JOIN groups g ON gm.id_groups=g.id 
                    INNER JOIN users_groups ug ON g.id=ug.id_groups 
                    INNER JOIN users u ON ug.id_user=u.id 
                    INNER JOIN personas p ON u.id_personas=p.id 
                    WHERE m.activo=1 and p.activo=1 and
                          u.id=".$id_usuario." 
                          GROUP BY m.controlador,m.metodo,m.id_padre,m.nombre 
                          ORDER BY m.orden";
            $query = $this->db->query($sql);
            return $query->result_array();

    }
    function getNotificacionesModel($id_user = 0){
        $sql = "SELECT u.id as id_notif_user, n.nombre, n.icon, n.fecha, TIME_TO_SEC(TIMEDIFF(now(),n.fecha)) AS dias FROM notificaciones n, notificaciones_users u
                WHERE n.id = u.id_notificaciones AND u.estado = 1 AND n.activo = 1 AND u.id_users = $id_user ORDER BY fecha DESC;";
        $query = $this->db->query($sql);
        // echo $sql; die;                
        return $query->result_array();
    }

    function markAsRead($id,$id_user){
        $sql = "UPDATE notificaciones_users set  estado = 0, fecha_leido = now()  WHERE id = $id and id_users = $id_user;";
        $query = $this->db->query($sql);  
        return $query;
    }





}
