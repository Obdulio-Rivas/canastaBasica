<%-- 
    Document   : informe
    Created on : 12-13-2020, 11:50:30 PM
    Author     : Rebeca ch
--%>

<%@page import="informe.conectar"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@ page import="java.io.*" %>
<%@ page import="java.util.*" %>
<%@ page import="java.sql.*" %>
<%@ page import="net.sf.jasperreports.engine.*" %>

<!DOCTYPE html>
<%
    // captura del nombre del informe
    String nombre = "canastabasica_reporte";
    
    //archivos base
    File reportFile;
    Map parameters = new HashMap();
    String modulo = "";

    /**
     * ****** listado de informes ********************************************
     */

    if (nombre.equalsIgnoreCase("canastabasica_reporte")) {
        
        modulo="reporte"; 
       
    } 

    
    reportFile = new File(application.getRealPath("informe/" + modulo)+ "/" + nombre + ".jasper");
    // ruta del reporte, parametros y conexion
    Connection conexion = conectar.getConexion();
    
    byte[] bytes = JasperRunManager.runReportToPdf(reportFile.getPath(), parameters, conexion);
    
    // generar pdf
     response.setContentType("application/pdf");
    /*response.setHeader("Content-disposition", "inline; filename=" + nombre + ".pdf");*/
    response.setContentLength(bytes.length);
    ServletOutputStream ouputStream = response.getOutputStream();
    ouputStream.write(bytes, 0, bytes.length);

    // limpiar y cerrar flujos de salida
    ouputStream.flush();
    ouputStream.close();

    // cerrar conexion
   conectar.cerrarConexion(conexion);
%>

