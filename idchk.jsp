<%@page import="java.io.PrintWriter"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="java.sql.*"%>
<% request.setCharacterEncoding("UTF-8");%>

<%
 System.out.println("1.jsp페이지");
 String id = request.getParameter("memid");
 System.out.println("2.memid : "+id);

  Connection con = null;  //DB관련 변수선언
  Statement stmt = null;

  try{ //드라이버 로딩
   Class.forName("org.mariadb.jdbc.Driver");
   String url = "jdbc:mysql://localhost:4342/login";
   con = DriverManager.getConnection(url, "root", "1111");
   System.out.println("3.드라이버 로딩 완료");
  }catch(Exception e){ //예외처리
   out.println("3-1.DB접속에 문제가 있습니다.<hr>");
   out.println(e.getMessage());
   e.printStackTrace();
  }

  //쿼리실행 준비
  stmt = con.createStatement();

  //DB에 memid가 id의 값을 가진 행을 전체출력
  String sql = "select * from member where memid='"+id +"'" ;
  ResultSet rs = stmt.executeQuery(sql);
  System.out.println("4.Resultset 값 :"+rs);
  if(rs.next() == true){
   id = rs.getString("memid");  //rs.next() <--이 조건이  참일 때 블럭을 반복함
   System.out.println("10."+id);
   System.out.println("DB에 값이 있음  --> 이미 존재하는 아이디");
  }else if(rs.next() == false){
   id = "";
   System.out.println("DB에 값이 없음 --> 사용가능한 아이디");
  }

  String json = "{\"memid\" :\""+ id + "\"}";
  //String json = "{\"memid\" :\"123\",\"mempw\" :\"222\"}";
  PrintWriter print = response.getWriter();
  out.println(json);
  System.out.println("4."+json);

 %>
