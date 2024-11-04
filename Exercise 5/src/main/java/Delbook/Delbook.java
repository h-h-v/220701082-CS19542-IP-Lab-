package Delbook;

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
 * Servlet implementation class Delbook
 */
@WebServlet("/Delbook")
public class Delbook extends HttpServlet {
    private static final long serialVersionUID = 1L;

    public Delbook() {
        super();
    }

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        // HTML structure
        out.println("<!DOCTYPE html>\n"
                + "<html>\n"
                + "<head>\n"
                + "<meta charset=\"UTF-8\">\n"
                + "<title>Delete Book</title>\n"
                + "</head>\n"
                + "<body>\n"
                + "<form method='GET'>\n"
                + "<input type='text' name='bookName' placeholder='Enter book name to delete'>\n"
                + "<input type='submit' value='Delete Book'>\n"
                + "</form>\n");

        Connection conn = null;
        PreparedStatement pstmt = null;

        try {
            // Get the book name from the request parameter
            String bookName = request.getParameter("bookName");

            // Check if a book name is provided
            if (bookName != null && !bookName.isEmpty()) {
                // Load MySQL JDBC Driver
                Class.forName("com.mysql.cj.jdbc.Driver");

                // Connect to the database
                conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/220701082", "root", "");  // Replace with your DB credentials

                // Use a prepared statement to prevent SQL injection and ensure the string is properly escaped
                String sql = "DELETE FROM lib WHERE book_name = ?";
                pstmt = conn.prepareStatement(sql);
                pstmt.setString(1, bookName);

                // Execute the deletion
                int rowsAffected = pstmt.executeUpdate();

                // Provide feedback to the user
                if (rowsAffected > 0) {
                    out.println("<p>Book '" + bookName + "' deleted successfully.</p>");
                } else {
                    out.println("<p>No book found with the name '" + bookName + "'.</p>");
                }
            } else {
                out.println("<p>Please enter a valid book name.</p>");
            }
        } catch (Exception e) {
            e.printStackTrace();
            out.println("<p>Error deleting the book.</p>");
        } finally {
            try {
                if (pstmt != null) pstmt.close();
                if (conn != null) conn.close();
            } catch (Exception e) {
                e.printStackTrace();
            }
        }

        // End the HTML
        out.println("</body>\n"
                + "</html>");
    }
}