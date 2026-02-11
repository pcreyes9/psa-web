import pyodbc
import pandas as pd
import os
from datetime import datetime
from plyer import notification
from sqlalchemy import create_engine


try:
    con = pyodbc.connect('DRIVER={SQL Server};Server=PSASERVER;Database=PSADBLIVE;UID=sa;PWD=p$a@dm1n')
    # con = pyodbc.connect('DRIVER={SQL Server};Server=PSASERVER\\MSSQLSRVR;Database=PSADBLIVE;UID=sa;PWD=p$a@dm1n')
    
    sqlQuery = """
        SELECT 
            m.member_id_no,
            m.psa_chapter_code
            ,m.psa_mem_type
            ,m.mem_last_name
            ,m.mem_first_name
            ,m.mem_middle_name
            ,m.mem_email_address
            ,m.mem_gender
            ,CONCAT(m.mem_last_name, m.member_id_no) AS password,
            mlb.bal
        FROM member m
        LEFT JOIN member_ledger_bal mlb 
            ON m.member_id_no COLLATE SQL_Latin1_General_CP1_CI_AS
            = mlb.member_id_no COLLATE SQL_Latin1_General_CP1_CI_AS
        WHERE mlb.fiscal_year = 2026
        AND m.mem_stat = 'Active'
        ORDER BY m.member_id_no;
        """
    
    # sqlQuery = """
    #     SELECT 
    #         m.member_id_no,
    #         mlb.bal
    #     FROM member m
    #     LEFT JOIN member_ledger_bal mlb 
    #         ON m.member_id_no = mlb.member_id_no
    #         WHERE mlb.fiscal_year = 2026
    #         AND m.mem_stat = 'Active'
    #     ORDER BY m.member_id_no;
    # """
    
    # sqlQuery = """
    #         SELECT 
    #             m.member_id_no,
    #             mlb.bal
    #         FROM member m
    #         LEFT JOIN member_ledger_bal mlb 
    #             ON m.member_id_no COLLATE SQL_Latin1_General_CP1_CI_AS
    #             = mlb.member_id_no COLLATE SQL_Latin1_General_CP1_CI_AS
    #         WHERE mlb.fiscal_year = 2026
    #         AND m.mem_stat = 'Active'
    #         ORDER BY m.member_id_no;
    #     """

      
    query = pd.read_sql(sqlQuery, con)
    df = pd.DataFrame(query)
    print(df)
    
    df.to_csv("PSA_MEM as of " + datetime.now().strftime("%d-%b-%Y") + ".csv", index = False)

    notification.notify(title = "Export Status", message = f"Data has been successfuly saved into Excel.\
        \nTotal Rows: {df.shape[0]}\nTotal Columns: {df.shape[1]}", timeout = 10)
except Exception as e:
    raise Exception (e)
  
  # Select * from Cme_program_registration where cme_program_code = "CME2025002" Into table REGMem_AC2025