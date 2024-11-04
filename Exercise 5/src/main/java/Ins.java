import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;

/**
 * Servlet implementation class Ins
 */
@WebServlet("/Ins")  // Add the URL mapping to the servlet
public class Ins extends HttpServlet {
    private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public Ins() {
        super();
        // TODO Auto-generated constructor stub
    }

    /**
     * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
     */
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        // Set response content type
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
                + "<form method='GET'>\n"
                + "<input type='text' name='bn' placeholder='Book Name'>\n"
                + "<input type='text' name='a' placeholder='Author'>\n"
                + "<input type='text' name='p' placeholder='Publisher'>\n"
                + "<input type='text' name='e' placeholder='Edition'>\n"
                + "<input type='text' name='pri' placeholder='Price'>\n"
                + "<input type='text' name='c' placeholder='Category'>\n"
                + "<input type='submit' value='Insert'>\n"
                + "</form>\n"
                + "</head>\n"
                + "<body>\n");

        Connection conn = null;
        PreparedStatement ps = null;

        try {
            // Load MySQL JDBC Driver
            Class.forName("com.mysql.jdbc.Driver");

            // Retrieve input values from the form
            String bn = request.getParameter("bn");
            String a = request.getParameter("a");
            String p = request.getParameter("p");
            String e = request.getParameter("e");
            String pri = request.getParameter("pri");
            String c = request.getParameter("c");

            // Check if all fields are filled
            if (bn != null && a != null && p != null && e != null && pri != null && c != null) {
                // Connect to the database
                conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/220701082", "root", "");  // Replace with your DB credentials

                // Prepare SQL query
                String sql = "INSERT INTO lib (book_name, author, publisher, edition, price, category) VALUES (?, ?, ?, ?, ?, ?)";
                ps = conn.prepareStatement(sql);

                // Set parameters
                ps.setString(1, bn);
                ps.setString(2, a);
                ps.setString(3, p);
                ps.setString(4, e);
                ps.setString(5, pri);
                ps.setString(6, c);

                // Execute SQL query
                int res = ps.executeUpdate();

                if (res != 0) {
                    out.println("<p>Book Details Inserted Successfully...</p>");
                } else {
                    out.println("<p>Book Details Insertion Failed...</p>");
                }
            } else {
                out.println("<p>Please fill all the fields.</p>");
            }
        } catch (Exception ex) {
            out.println("<p>Error: " + ex.getMessage() + "</p>");
            ex.printStackTrace();
        } finally {
            // Close resources
            try {
                if (ps != null) ps.close();
                if (conn != null) conn.close();
            } catch (Exception e) {
                e.printStackTrace();
            }
        }

        // End the HTML
        out.println("</body>\n</html>");
    }
}