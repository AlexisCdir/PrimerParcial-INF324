using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Default2 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        string usuario, contraseña;
        usuario = Request.QueryString["usuario"];
        contraseña = Request.QueryString["contraseña"];
        Response.Write("<br />");
        Response.Write(contraseña);
        //response.redirect("ruta");
    }
}