<%@page import="java.io.PrintWriter"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="java.sql.*"%>
<% request.setCharacterEncoding("UTF-8");%>


<%
 /* 변수 선언 후  값 넣어주기 */
 String id="", pw ="";
 id = request.getParameter("memid");
 pw = request.getParameter("mempw");
 System.out.println("1.memid 값"+id);
 System.out.println("2.mempw 값"+pw);
 session.setAttribute("s_id",id);  /*  파라미터를 받아서 세션값을 설정한다. */
 System.out.println(session.getAttribute("s_id"));

 Connection con = null;  //DB관련 변수선언
 Statement stmt = null;

  try{   //드라이버 로딩
   Class.forName("org.mariadb.jdbc.Driver");
   String url = "jdbc:mysql://localhost:4342/login";
   con = DriverManager.getConnection(url, "root", "1111");
   System.out.println("3.드라이버 로딩 완료");
  }catch(Exception e){    //예외처리
   out.println("3-1.DB접속에 문제가 있습니다.<hr>");
   out.println(e.getMessage());
   e.printStackTrace();
  }

  //쿼리실행 준비
  stmt = con.createStatement();
  String sql = "select * from member where memid='"+id +"' AND mempw='" + pw +"'" ;

  //결과 값 받아오기
  ResultSet rs = stmt.executeQuery(sql);
  System.out.println("4.Resultset 값 :"+rs);

  //rs.next() <--이 조건이  참일 때 DB에서 가져온 값 꺼내기
  if(rs.next() == true){
   id = rs.getString("memid");
   pw = rs.getString("mempw");
   System.out.println("DB에 값이 있음");
   System.out.println(id+":"+pw);
  }else{   //false일 경우 ""로 초기화
   id = "";
   pw = "";
   System.out.println("DB에 값이 없음.");
  }

  //JSON타입으로 변환
  String json = "{\"memid\" :"+'"' + id + '"'+",\"mempw\" :" +'"'+ pw +'"'+ "}";
  PrintWriter print = response.getWriter();
  out.println(json);
  System.out.println(json);
 %>
