<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WebModel extends CI_Model
{
	public function getAll($table)
	{
		$query = $this->db->get($table);
		return $query->result();
	}

	public function getAllRibbonsWhere($where)
	{
		$this->db->select('*');
		$this->db->from('ribbons');
		$this->db->where($where);
        $this->db->order_by('order_precedence' , 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getRibbonAttachments($ribbonId)
	{
		$this->db->select('attachments.*');
		$this->db->from('attachments');
		$this->db->join('ribbons_attachments', 'attachments.id = ribbons_attachments.attachment_id');
		$this->db->where('ribbons_attachments.ribbon_id', $ribbonId);
		$query = $this->db->get();
		return $query->result();
	}

	public function getAttachmentOptions($attachmentId)
	{
		$this->db->select('*');
		$this->db->from('attachment_options');
		$this->db->where('attachment_id', $attachmentId);
		$query = $this->db->get();
		return $query->result();
	}

    public function getAttachmentOption($id)
    {
        $this->db->select('*');
        $this->db->from('attachment_options');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAttachment($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('attachments');
        return $query->result();
    }

    public function insertOrder($data)
    {
        $this->db->insert('orders', $data);
        return $this->db->insert_id();
    }
}
