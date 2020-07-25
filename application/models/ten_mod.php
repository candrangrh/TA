<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ten_mod extends CI_Model
{
    public function get_tenant()
    {
        $data = $this->db->get('tenant');
        return $data->result_array();
    }

    public function get_transaksi()
    {
        $this->db->distinct('*');
        $this->db->from('transaksi_order');
        $this->db->join('akun_customer', 'akun_customer.id_akun_customer = transaksi_order.id_akun_customer');
        $this->db->join('order_cust', 'order_cust.id_order = transaksi_order.id_order');
        $this->db->join('detail_order', 'detail_order.id_order = order_cust.id_order');
        $this->db->join('menu', 'menu.id_menu = detail_order.id_menu');
        $this->db->join('tenant', 'tenant.id_tenant = menu.id_tenant');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_detil_tenant($name)
    {
        $this->db->distinct('*');
        $this->db->from('transaksi_order');
        $this->db->join('akun_customer', 'akun_customer.id_akun_customer = transaksi_order.id_akun_customer');
        $this->db->join('order_cust', 'order_cust.id_order = transaksi_order.id_order');
        $this->db->join('detail_order', 'detail_order.id_order = order_cust.id_order');
        $this->db->join('menu', 'menu.id_menu = detail_order.id_menu');
        $this->db->join('tenant', 'tenant.id_tenant = menu.id_tenant');
        $this->db->where('nama_tenant', $name);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_rekap()
    {

        $this->db->select('tenant.id_tenant,detail_order.id_order,waktu_transaksi,id_transaksi_order,SUM(total_harga) AS jumlah');
        $this->db->from('transaksi_order');
        $this->db->join('akun_customer', 'akun_customer.id_akun_customer = transaksi_order.id_akun_customer');
        $this->db->join('order_cust', 'order_cust.id_order = transaksi_order.id_order');
        $this->db->join('detail_order', 'detail_order.id_order = order_cust.id_order');
        $this->db->join('menu', 'menu.id_menu = detail_order.id_menu');
        $this->db->join('tenant', 'tenant.id_tenant = menu.id_tenant');
        $this->db->order_by('transaksi_order.waktu_transaksi');
        $this->db->group_by('tenant.id_tenant,transaksi_order.waktu_transaksi');
        $total = $this->db->get()->result_array();
        foreach ($total as $tot) {
            $data = array(
                'id_transaksi_order' => $tot['id_order'],
                'tgl_rekap' => date("Y-d-m"),
                'pendapatan_total' => $tot['jumlah'],
                'persen_potongan' => 0.15,
                'bersih_tenant' => $tot['jumlah'] - ($tot['jumlah'] * 0.15),
                'bersih_pengelola' => $tot['jumlah'] * 0.15,
                'waktu_transaksi' => $tot['waktu_transaksi'],
                'id_tenant' => $tot['id_tenant']
            );
            $this->db->insert('rekap', $data);
        }
    }

    public function get_rekap()
    {
        $this->db->from('rekap');
        $this->db->join('tenant', 'rekap.id_tenant=tenant.id_tenant');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_detail_rekap($name)
    {
        $this->db->distinct('*');
        $this->db->from('rekap');
        $this->db->join('tenant', 'tenant.id_tenant=rekap.id_tenant');
        $this->db->where('nama_tenant', $name);
        $this->db->order_by('waktu_transaksi', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_detail_rekapall()
    {
        $this->db->select('SUM(bersih_pengelola) AS pengelola,waktu_transaksi');
        $this->db->from('rekap');
        $this->db->group_by('waktu_transaksi');
        $this->db->order_by('waktu_transaksi', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
}
