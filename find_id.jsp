<%@page import="java.io.PrintWriter"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="java.sql.*"%>
<% request.setCharacterEncoding("UTF-8");%>


<%
     // System.out.println("jsp");
 String id ="", name="", pnum ="", email ="";
 id = request.getParameter("memid");
 name = request.getParameter("memnm");
 email = request.getParameter("mememail");

  Connection con = null;  //DB관련 변수선언
  Statement stmt = null;

  try{  //드라이버 로딩
   Class.forName("org.mariadb.jdbc.Driver");
   String url = "jdbc:mysql://localhost:4342/login";
   con = DriverManager.getConnection(url, "root", "1111");
   System.out.println("3.드라이버 로딩 완료");
  }catch(Exception e){   //예외처리
   out.println("3-1.DB접속에 문제가 있습니다");
   out.println(e.getMessage());
   e.printStackTrace();
  }

  //쿼리실행 준비
  stmt = con.createStatement();
  String sql = "select * from member where memnm='"+ name +"' AND mememail='" + email +"'" ;
  ResultSet rs = stmt.executeQuery(sql);
  System.out.println("4.Resultset 값 :"+rs);
  if(rs.next() == true){
   id = rs.getString("memid");
   name = rs.getString("memnm");
   email = rs.getString("mememail");
   System.out.println(id+"/"+name+"/"+email+"/");
   System.out.println("DB에 일치하는 id값이 있음");
  }else{
   id = "";
   name = "";
   email = "";
   System.out.println("DB에 일치하는 id값이 없음.");
  }
  String json = "{\"memid\" :"+'"' + id + '"'+",\"memnm\" :" +'"'+ name +'"'+ ",\"mememail\" :" +'"'+ email +'"'+ "}";
  PrintWriter print = response.getWriter();
  out.println(json);
  System.out.println(json);
 %>
