import win32com.client as win32
import sys

# Capturar argumentos da linha de comando
email_destino = sys.argv[1]
corpo_email = sys.argv[2]

#criar a integração com o outlook
outlook = win32.Dispatch('outlook.application')

#criar o email
email = outlook.CreateItem(0)

#configura as informações do email
email.To = email_destino
email.Subject = "Credenciais de acesso TECH-SUAS"
email.HTMLBody = corpo_email
