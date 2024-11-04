package Indbook;

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;

/**
 * Servlet implementation class Book
 */
@WebServlet("/Indbook")
public class Indbook extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public Indbook() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
		
		
		response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        // HTML structure
        out.println("<!DOCTYPE html>\n"
                + "<html>\n"
                + "<head>\n"
                + "<meta charset=\"UTF-8\">\n"
                + "<link rel=\"stylesheet\" href=\"styles.css\">\n"
                + "<title>All Books</title>\n"
                + "<style>\n"
                + "table {\n"
                + "  padding-top:10%;\n"
                + "  font-family: Arial, sans-serif;\n"
                + "  border-collapse: collapse;\n"
                + "  width: 100%;\n"
                + "}\n"
                + "td, th {\n"
                + "  border: 1px solid #dddddd;\n"
                + "  text-align: left;\n"
                + "  padding: 8px;\n"
                + "  color:black;"
                + "}\n"
                + "tr:nth-child(even) {\n"
                + "  background-color: #f2f2f2;\n"
                + "}\n"
                + "</style>\n"
                + "</head>\n"
                + "<body>\n"
                + "<form method='GET'>\n"
                + "<input type='text' name='searchQuery' placeholder='Search'>\n"
                + "<input type='submit' value='Search'>\n"
                + "</form>\n"
                + "<table>\n"
                + "  <tr>\n"
                + "    <th>Book Name</th>\n"
                + "    <th>Author</th>\n"
                + "    <th>Publisher</th>\n"
                + "    <th>Edition</th>\n"
                + "    <th>Price</th>\n"
                + "    <th>Category</th>\n"
                + "  </tr>\n");

        Connection conn = null;
        Statement stmt = null;
        ResultSet rs = null;

        try {
            // Load MySQL JDBC Driver
        	Class.forName("com.mysql.jdbc.Driver");
        	
        	String searchQuery = request.getParameter("searchQuery");

            // Connect to the database
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/220701082", "root", "");  // Replace with your DB credentials

            // Execute SQL query
            stmt = conn.createStatement();
            String sql = "SELECT * FROM lib where book_name like '%"+searchQuery+"%'";  // Adjust column names if needed
            rs = stmt.executeQuery(sql);

            // Process the ResultSet and generate the HTML table rows
            while (rs.next()) {
                String book_name = rs.getString("book_name");
                String author = rs.getString("author");
                String publisher = rs.getString("publisher");
                String edition = rs.getString("edition");
                int price = rs.getInt("price");
                String category = rs.getString("category");

                out.println("<tr>\n"
                        + "    <td>" + book_name + "</td>\n"
                        + "    <td>" + author + "</td>\n"
                        + "    <td>" + publisher + "</td>\n"
                        + "    <td>" + edition + "</td>\n"
                        + "    <td>" + price + "</td>\n"
                        + "    <td>" + category + "</td>\n"
                        + "  </tr>\n");
            }
        } catch (Exception e) {
            e.printStackTrace();
            out.println("<p>Error retrieving data</p>");
        } finally {
            // Close resources
            try {
                if (rs != null) rs.close();
                if (stmt != null) stmt.close();
                if (conn != null) conn.close();
            } catch (Exception e) {
                e.printStackTrace();
            }
        }

        // End the HTML
        out.println("</table>\n"
                + "</body>\n"
                + "</html>");
    }
		

		
		
		
		
	

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
