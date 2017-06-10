<%@page import="java.io.PrintWriter"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="java.sql.*"%>
<% request.setCharacterEncoding("UTF-8");%>

<%
System.out.println("0. jsp 파일");
 String id="",pw="",name="",pnum="",email="",gen="";
 id = request.getParameter("memid");
 pw = request.getParameter("mempw");
 name = request.getParameter("memnm");
 pnum = request.getParameter("mempnum");
 email = request.getParameter("mememail");
 accb = request.getParameter("memaccb");
 accn = request.getParameter("memaccn");
 birth = request.getParameter("membirth");
 System.out.println("1.memid :"+id);

 ResultSet rs = null;  //DB연결 관련 변수 선언
 String sql;
 Connection con = null;
 Statement stmt = null;

 try{   //드라이버 로딩
  Class.forName( "com.mysql.jdbc.Driver");
  String url = "jdbc:mysql://localhost:4342/login";
  con = DriverManager.getConnection(url, "root", "1111");
  System.out.println("2.드라이버 로딩 완료");
 }catch(Exception e){
  out.println("2-1.DB접속에 문제가 있습니다");  //에러 이벤트시 출력할 메세지
  out.println(e.getMessage());     //에러 이벤트와 함께 들어오는 메세지 출력
  e.printStackTrace();      //에러 메세지의 발생 근원지를 찾아 단계별로 에러출력
 }

 //쿼리 실행 준비
 stmt = con.createStatement();

 //sql 문장
sql = "insert into member(memid, mempw, memnm, mempnum, mememail, memaccb, memaccn, membirth)
       values('"+id+"','"+pw+"','"+name+"','"+pnum+"','"+email+"','"+accb+"','"+accn+"','"+birth+"','"+"')";

 /*
  * executeQuery  : select의 쿼리를 실행할때 사용(값의 변화가 없고 검색만 사용)
  * executeUpdate : insert, update, delete의 쿼리를 실행할 때 사용 -> DB에서 결과확인
  */
 try{
  stmt.executeUpdate(sql);
  System.out.print(sql);
  System.out.println("3.DB삽입 연산이 성공하였습니다.");
 }catch(Exception e){  // 예외처리
  out.println("3-1.DB삽입 연산이 실패하였습니다.");
  out.println("3-2."+e.getMessage());
  e.printStackTrace();
 }
   //자원해제해 줄것
  con.close();
  stmt.close();

 //JSON 타입으로 변환
 String json = "{\"memid\" :"+'"' + id + '"'+",\"mempw\" :" +'"'+ pw +'"'+
  ",\"memnm\" :" +'"'+ name +'"'+ ",\"mempnum\" :" +'"'+ pnum +
  '"'+ ",\"mememail\" :" +'"'+ email +'"'+ ",\"memaccb\" :" +'"'+ accb +'"'+ ",\"memaccn\" :" + '"'+ accn +'"' +
  ",\"membirth\" :" + '"' + birth +'"' + "}";
 PrintWriter print = response.getWriter();
 out.println(json);
 System.out.println(json);
%>
