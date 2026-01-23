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
        SELECT member_id_no
            ,[psa_chapter_code]
            ,psa_mem_type
            ,[mem_last_name]
            ,[mem_first_name]
            ,[mem_middle_name]
            ,[mem_email_address]
            ,[psa_mem_stat]
            ,mem_gender
            ,CONCAT(mem_last_name, member_id_no) AS password
        FROM member
        """

      
    query = pd.read_sql(sqlQuery, con)
    df = pd.DataFrame(query)
    # print(df)
    
    df.to_csv("PSA_MEM as of " + datetime.now().strftime("%d-%b-%Y") + ".csv", index = False)

    notification.notify(title = "Export Status", message = f"Data has been successfuly saved into Excel.\
        \nTotal Rows: {df.shape[0]}\nTotal Columns: {df.shape[1]}", timeout = 10)
except Exception as e:
    raise Exception (e)
  
  # Select * from Cme_program_registration where cme_program_code = "CME2025002" Into table REGMem_AC2025