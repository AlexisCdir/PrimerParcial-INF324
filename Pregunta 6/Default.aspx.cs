using System;
using System.Collections.Generic;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;

public partial class _Default : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        SqlConnection con = new SqlConnection();
        con.ConnectionString = "server=(local); user=alexis; pwd=1234; database=mibd_cundir";
        SqlDataAdapter ada = new SqlDataAdapter();
        ada.SelectCommand = new SqlCommand();
        ada.SelectCommand.Connection = con;
        ada.SelectCommand.CommandText = "select * from usuario";
        ada.SelectCommand.CommandType = CommandType.Text;
        DataSet ds = new DataSet();
        ada.Fill(ds);
        GridView1.DataSource = ds.Tables[0];
        GridView1.DataBind();
    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
    protected void TextBox1_TextChanged(object sender, EventArgs e)
    {

    }
    protected void TextBox2_TextChanged(object sender, EventArgs e)
    {

    }
    protected void TextBox3_TextChanged(object sender, EventArgs e)
    {

    }
    protected void TextBox4_TextChanged(object sender, EventArgs e)
    {

    }
    protected void TextBox5_TextChanged(object sender, EventArgs e)
    {

    }
    protected void TextBox6_TextChanged(object sender, EventArgs e)
    {

    }
    protected void TextBox7_TextChanged(object sender, EventArgs e)
    {

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        SqlConnection con = new SqlConnection();
        con.ConnectionString = "server=(local); user=alexis; pwd=1234; database=mibd_cundir";
        SqlCommand cmd = new SqlCommand();
        string sql = string.Empty;
        sql = sql + "insert into usuario (ci, nombre, paterno) values ('" + TextBox1.Text + "','" + TextBox2.Text + "','" + TextBox3.Text + "')";
        cmd.CommandText = sql;
        cmd.CommandType = CommandType.Text;
        cmd.Connection = con;
        con.Open();
        cmd.ExecuteNonQuery();
        con.Close();

        SqlConnection con2 = new SqlConnection();
        con2.ConnectionString = "server=(local); user=alexis; pwd=1234; database=mibd_cundir";
        SqlDataAdapter ada2 = new SqlDataAdapter();
        ada2.SelectCommand = new SqlCommand();
        ada2.SelectCommand.Connection = con2;
        ada2.SelectCommand.CommandText = "select * from usuario";
        ada2.SelectCommand.CommandType = CommandType.Text;
        DataSet ds = new DataSet();
        ada2.Fill(ds);
        GridView1.DataSource = ds.Tables[0];
        GridView1.DataBind();
    }

    protected void Button2_Click(object sender, EventArgs e)
    {
        SqlConnection con = new SqlConnection();
        con.ConnectionString = "server=(local); user=alexis; pwd=1234; database=mibd_cundir";
        SqlCommand cmd = new SqlCommand();
        string sql = string.Empty;
        sql = sql + "DELETE FROM usuario WHERE ci = " + TextBox4.Text ;
        cmd.CommandText = sql;
        cmd.CommandType = CommandType.Text;
        cmd.Connection = con;
        con.Open();
        cmd.ExecuteNonQuery();
        con.Close();

        SqlConnection con2 = new SqlConnection();
        con2.ConnectionString = "server=(local); user=alexis; pwd=1234; database=mibd_cundir";
        SqlDataAdapter ada2 = new SqlDataAdapter();
        ada2.SelectCommand = new SqlCommand();
        ada2.SelectCommand.Connection = con2;
        ada2.SelectCommand.CommandText = "select * from usuario";
        ada2.SelectCommand.CommandType = CommandType.Text;
        DataSet ds = new DataSet();
        ada2.Fill(ds);
        GridView1.DataSource = ds.Tables[0];
        GridView1.DataBind();
    }

    protected void Button3_Click(object sender, EventArgs e)
    {
        SqlConnection con = new SqlConnection();
        con.ConnectionString = "server=(local); user=alexis; pwd=1234; database=mibd_cundir";
        SqlCommand cmd = new SqlCommand();
        string sql = string.Empty;
        sql = sql + "update usuario set nombre = '" + TextBox6.Text + "', paterno = '" + TextBox7.Text + "' where ci = " + TextBox5.Text;
        cmd.CommandText = sql;
        cmd.CommandType = CommandType.Text;
        cmd.Connection = con;
        con.Open();
        cmd.ExecuteNonQuery();
        con.Close();

        SqlConnection con2 = new SqlConnection();
        con2.ConnectionString = "server=(local); user=alexis; pwd=1234; database=mibd_cundir";
        SqlDataAdapter ada2 = new SqlDataAdapter();
        ada2.SelectCommand = new SqlCommand();
        ada2.SelectCommand.Connection = con2;
        ada2.SelectCommand.CommandText = "select * from usuario";
        ada2.SelectCommand.CommandType = CommandType.Text;
        DataSet ds = new DataSet();
        ada2.Fill(ds);
        GridView1.DataSource = ds.Tables[0];
        GridView1.DataBind();
    }
}
