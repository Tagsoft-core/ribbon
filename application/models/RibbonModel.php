<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RibbonModel extends CI_Model
{
	public function checkData($data)
	{
		$this->db->select('*');
		$this->db->where($data);
		$result = $this->db->get('type');
		return $result->row();
	}

	public function insert($data, $table)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function getAll($table)
	{
		$query = $this->db->get($table);
		return $query->result();
	}

	public function getRibbonsWithAttachment($type = null, $branch = null)
	{
		$this->db->select('ribbons.*, ribbons.id as ribbon_id, branch.name as branch_name, type.name as type_name');
		$this->db->from('ribbons');
		$this->db->join('type', 'ribbons.type_id = type.id', 'left');
		$this->db->join('branch', 'ribbons.branch_id = branch.id', 'left');
		if (!empty($type)) {
			$this->db->where('ribbons.type_id', $type);
		}
		if (!empty($branch)) {
			$this->db->where('ribbons.branch_id', $branch);
		}

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

	public function getWhere($table, $id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get($table);
		return $query->result();
	}

	public function updateAttachment($id, $data)
	{
		return $this->db->set('options', $data)
			->where('id', $id)
			->update('attachments');

		//$this->db->where('id', $id);
		//$this->db->update('attachments', array('options' => $data));
	}

	public function getAttachmentOptions($attachmentId)
	{
		$this->db->select('*');
		$this->db->from('attachment_options');
		$this->db->where('attachment_id', $attachmentId);
		$query = $this->db->get();
		return $query->result();
	}
}
