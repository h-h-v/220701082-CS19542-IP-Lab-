import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;

import java.io.*;
public class Class1 extends HttpServlet {
/*    public Class1() {
        super();
        // TODO Auto-generated constructor stub
    }*/
	protected void doPost(HttpServletRequest rq, HttpServletResponse rs) throws ServletException, IOException {
		String name = rq.getParameter("name");
		PrintWriter out = rs.getWriter();
		out.println("<h1>"+name+"</h1>");
		String gender = rq.getParameter("gender");
		out.println("<h1>"+gender+"</h1>");
		String mail = rq.getParameter("mail");
		out.println("<h1>"+mail+"</h1>");
		String ph = rq.getParameter("ph");
		out.println("<h1>"+ph+"</h1>");
		String add = rq.getParameter("add");
		out.println("<h1>"+add+"</h1>");
		String city = rq.getParameter("city");
		out.println("<h1>"+city+"</h1>");
		String con = rq.getParameter("con");
		out.println("<h1>"+con+"</h1>");
		String yr = rq.getParameter("yr");
		out.println("<h1>"+yr+"</h1>");
	}

}
