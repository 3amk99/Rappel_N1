### The associations between CLIENT, COMMANDE, and PRODUCT:
- CLIENT -- makes -- COMMANDE
- COMMANDE -- contains -- PRODUCT

### Determining the cardinalities 
- CLIENT ─── (0,N) ─── makes ─── (1,1) ─── COMMANDE
- COMMANDE ─── (1,N) ─── contains ─── (0,N) ─── PRODUCT

## The illustrated image

```mermaid
erDiagram
    CLIENT ||--o{ COMMANDE : makes
    COMMANDE |{--o{ PRODUCT : contains
    
    CLIENT {
        string id PK
        string name
        string email
    }
    COMMANDE {
        string id PK
        string commande_number
        string date_commande
        string quantite_commande
    }
    PRODUCT {
        string id PK
        string product_name
        string product_price
    }